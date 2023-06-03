<?php

namespace App\Repositories;

use App\Interfaces\ProjectDepartmentRepositoryInterface;
use App\Models\ProjectDepartment;

class ProjectDepartmentRepository implements ProjectDepartmentRepositoryInterface {
    public function getAllDeparments() {
        return ProjectDepartment::orderBy('created_at')->get();
    }

    public function getDepartmentCategories($id) {
        return ProjectDepartment::find($id)->categories;
    }
}
