<?php

namespace App\Repositories;

use App\Interfaces\ReadyProjectRepositoryInterface;
use App\Models\ReadyProject;

class ReadyProjectRepository implements ReadyProjectRepositoryInterface {
    public function fill(array $ready_project) {
        return ((new ReadyProject)->fill($ready_project));
    }

    public function fillGet(array $ready_project) {
        return $this->findById($ready_project['id']);
    }

    public function getAllReadyProjects($paginate = false, $num = 5) {
        if ($paginate) {
            return ReadyProject::paginate($num);
        } else {
            return ReadyProject::orderBy('created_at')->get();
        }
    }

    public function findById($id) {
        return ReadyProject::find($id);
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
            ]);
            return 0;
        }
        else {
            $ready_project->userRatings()->attach(auth()->user()->id, [
                'rating' => $data['rating'],
                'message' => $data['message']
            ]);
            return 1;
        }
    }

    private function storeLike(ReadyProject $ready_project) {
        return $ready_project->likes()->create([
            'user_id' => auth()->user()->id,
            'likesable_type' => ReadyProject::class,
            'likesable_id' => $ready_project->id,
        ]);
    }
}
