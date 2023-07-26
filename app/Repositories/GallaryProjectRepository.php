<?php
namespace App\Repositories;

use App\Helpers\File;
use App\Interfaces\GallaryProjectRepositoryInterface;
use App\Models\GalleryProject;

class GallaryProjectRepository implements GallaryProjectRepositoryInterface
{
    use File;

    public function getAllProjects($paginate = true, $num = 10, $limit = null)
    {
        if ($limit) {
            return GalleryProject::limit($limit)->get();
        }

        if ($paginate){
            return GalleryProject::paginate($num);
        } else {
            return GalleryProject::get();
        }
    }

    public function store($data, $image) {
        return GalleryProject::create([
            'description' => [
                'en' => $data['desc_en'],
                'ar' => $data['desc_ar']
            ],
            'gallery_type_id' => $data['dept_id'],
            'user_id' => auth()->user()->id,
            'image' => $this->prepareFilePath($image, 'admin/gallery/images', true),
        ]);
    }

    public function delete($id) {
        $project = $this->getProjectById($id);
        $this->deleteUsingFilePath($project->image_uri);
        return GalleryProject::destroy($id);
    }

    public function getProjectById($id)
    {
        return GalleryProject::find($id);
    }
}
