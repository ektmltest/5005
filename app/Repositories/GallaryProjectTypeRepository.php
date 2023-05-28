<?php

namespace App\Repositories;
use App\Interfaces\GallaryProjectTypeRepositoryInterface;
use App\Models\GalleryProject;
use App\Models\GalleryProjectType;

class GallaryProjectTypeRepository implements GallaryProjectTypeRepositoryInterface {
    public function getAllTypes() {
        return GalleryProjectType::all();
    }
}
