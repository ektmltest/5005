<?php

namespace App\Repositories;

use App\Interfaces\ProjectCategoryRepositoryInterface;
use App\Models\ProjectCategory;

class ProjectCategoryRepository implements ProjectCategoryRepositoryInterface {
    public function getAllCategories() {
        return ProjectCategory::all();
    }
}
