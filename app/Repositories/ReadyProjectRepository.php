<?php

namespace App\Repositories;

use App\Helpers\File;
use App\Helpers\Template;
use App\Interfaces\ReadyProjectRepositoryInterface;
use App\Models\ReadyProject;
use App\Models\ReadyProjectDepartment;

class ReadyProjectRepository implements ReadyProjectRepositoryInterface {
    use File;

    public function fill(array $ready_project) {
        return ((new ReadyProject)->fill($ready_project));
    }

    public function fillGet(array $ready_project) {
        return $this->findById($ready_project['id']);
    }

    public function getAllReadyProjects($paginate = false, $num = 10, $max = null) {
        if ($paginate) {
            return ReadyProject::orderBy('created_at', 'DESC')->paginate($max ? $max : $num);
        } else {
            if ($max)
                return ReadyProject::orderBy('created_at', 'DESC')->limit($max)->get();
            else
                return ReadyProject::orderBy('created_at', 'DESC')->get();
        }
    }

    public function getOfferedProjects($paginate = false, $num = 10, $max = null) {
        if ($paginate) {
            return ReadyProject::where('is_offered', 1)->orderBy('created_at', 'DESC')->paginate($max ? $max : $num);
        } else {
            if ($max)
                return ReadyProject::where('is_offered', 1)->orderBy('created_at', 'DESC')->limit($max)->get();
            else
                return ReadyProject::where('is_offered', 1)->orderBy('created_at', 'DESC')->get();
        }
    }

    public function getReadyProjectsByDepartmentId($id, $max = null) {
        $query = ReadyProject::orderBy('created_at', 'DESC')->where('ready_project_department_id', $id);
        if ($max)
            $query->limit($max);

        return $query->get();
    }

    public function findById($id) {
        return ReadyProject::find($id);
    }

    public function getNextId($id) {
        $founded = ReadyProject::select('id')->where('id', '>', $id)->first();
        if ($founded)
            return $founded->id;
        else
            return null;
    }

    public function getPreviousId($id) {
        $founded = ReadyProject::select('id')->orderBy('id', 'DESC')->where('id', '<', $id)->first();
        if ($founded)
            return $founded->id;
        else
            return null;
    }

    public function toggleLike($ready_project) {
        if (!$ready_project->liked()){
            $this->storeLike($ready_project);
            return true;
        } else {
            $ready_project->likes()->delete();
            return false;
        }
    }

    public function setRate(ReadyProject $ready_project, $data) {
        $found = $ready_project->userRatings()->wherePivot('user_id', auth()->user()->id)->first();
        if ($found) {
            $ready_project->userRatings()->updateExistingPivot(id: auth()->user()->id, attributes: [
                'rating' => $data['rating'],
                'message' => $data['message'],
                'updated_at' => now(),
            ]);
            $rating = $ready_project->average_rating;
            $ready_project->save();
            return 0;
        }
        else {
            $ready_project->userRatings()->attach(auth()->user()->id, [
                'rating' => $data['rating'],
                'message' => $data['message'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $rating = $ready_project->average_rating;
            $ready_project->save();
            return 1;
        }
    }

    public function store($project, $complex_data, $image) {
        $ready_project = ReadyProject::create([
            'name' => [
                'en' => $project->name_en,
                'ar' => $project->name_ar
            ],
            'body' => [
                'en' => $complex_data['desc_en'],
                'ar' => $complex_data['desc_ar']
            ],
            'description' => [
                'en' => $project->short_desc_en,
                'ar' => $project->short_desc_ar
            ],
            'price' => $project->price,
            'marketing_discount_ratio' => $project->tax,
            'ready_project_department_id' => $project->dept_id,
            'link' => $project->link,
            'image' => $this->prepareFilePath($image, 'admin/store/projects', true),
            'user_id' => auth()->user()->id
        ]);

        $this->storeProjectDependencies($complex_data, $ready_project);

        return $ready_project;
    }

    public function update($dataToUpdate, $complex_data, ReadyProject $ready_project) {
        $this->deleteProjectDependencies($ready_project);

        ReadyProject::where('id', $ready_project->id)->update($dataToUpdate);

        $this->storeProjectDependencies($complex_data, $ready_project);

        return $this->findById($ready_project->id);
    }

    public function storeProjectDependencies($complex_data, ReadyProject $ready_project) {
        if (isset($complex_data['facilities_ids']))
            $ready_project->facilities()->attach($complex_data['facilities_ids']);
        if (isset($complex_data['addons_ids']))
            $ready_project->addons()->attach($complex_data['addons_ids']);
        if (isset($complex_data['tags_ids']))
            $ready_project->tags()->attach($complex_data['tags_ids']);
    }

    public function deleteProjectDependencies(ReadyProject $ready_project) {
        $ready_project->facilities()->detach();
        $ready_project->addons()->detach();
        $ready_project->tags()->detach();
    }

    public function delete($id) {
        return ReadyProject::destroy($id);
    }

    public function count($department_id = null) {
        if ($department_id) {
            return ReadyProject::orderBy('created_at', 'DESC')
                ->where('ready_project_department_id', $department_id)
                ->count();
        } else
            return ReadyProject::count();
    }

    public function filter($filters, $paginate = true, $num = 10) {
        $query = ReadyProject::query();

        if (isset($filters['department_id']))
            $query = ReadyProjectDepartment::find($filters['department_id'])->readyProjects();

        if (isset($filters['start_price']))
            $query->whereBetween('price', [$filters['start_price'], $filters['end_price']]);

        if (isset($filters['rate']))
            $query->where('average_rating', '<=', (double)($filters['rate']));

        $query = $this->ordering($query, $filters);

        return $paginate ? $query->paginate($num) : $query->get();
    }

    public function setAsOffered($id) {
        $project = $this->findById($id);
        $project->is_offered = !$project->is_offered;
        $project->save();
    }

    private function ordering($query, $filters) {
        if (isset($filters['filtered_with_purchases']) && $filters['filtered_with_purchases'])
            $query->orderBy('num_of_purchases', 'DESC');
        else {
            if (isset($filters['rate']))
                $query->orderBy('average_rating', 'DESC');
            else if (isset($filters['start_price']))
                $query->orderBy('price');
            else
                $query->orderBy('created_at', 'DESC');
        }

        return $query;
    }

    private function storeLike(ReadyProject $ready_project) {
        return $ready_project->likes()->create([
            'user_id' => auth()->user()->id,
            'likesable_type' => ReadyProject::class,
            'likesable_id' => $ready_project->id,
        ]);
    }
}
