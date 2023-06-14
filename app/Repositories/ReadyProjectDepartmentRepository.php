<?php

namespace App\Repositories;

use App\Interfaces\ReadyProjectDepartmentRepositoryInterface;
use App\Models\ReadyProjectDepartment;

class ReadyProjectDepartmentRepository implements ReadyProjectDepartmentRepositoryInterface {
    public function getAllDepartments() {
        return ReadyProjectDepartment::get();
    }

    public function getDepartmentById($id) {
        return ReadyProjectDepartment::find($id);
    }
}
