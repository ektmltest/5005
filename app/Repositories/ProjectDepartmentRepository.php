<?php

namespace App\Repositories;

use App\Interfaces\ProjectDepartmentRepositoryInterface;
use App\Models\ProjectDepartment;

class ProjectDepartmentRepository implements ProjectDepartmentRepositoryInterface {

    public function getDepartmentById($id) {
        return ProjectDepartment::find($id);
    }

    public function getAllDeparments() {
        return ProjectDepartment::orderBy('created_at')->get();
    }

    public function getDepartmentCategories($id) {
        return ProjectDepartment::find($id)->categories;
    }

    public function checkCategoriesDependency($department, $categories) {
        foreach ($categories as $category) {
            if ($category->project_department_id != $department->id)
                return false;
        }
        return true;
    }
}
