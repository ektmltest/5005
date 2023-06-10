<?php
namespace App\Repositories;
use App\Interfaces\GallaryProjectRepositoryInterface;
use App\Models\GalleryProject;

class GallaryProjectRepository implements GallaryProjectRepositoryInterface
{
    public function getAllProjects($paginate = true, $num = 5)
    {
        if($paginate){
            return GalleryProject::paginate($num);
        } else {
            return GalleryProject::get();
        }
    }

    public function getProjectById($id) {
        return GalleryProject::find($id);
    }
}
