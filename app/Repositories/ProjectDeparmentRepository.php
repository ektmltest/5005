<?php

namespace App\Repositories;

use App\Interfaces\ProjectDeparmentRepositoryInterface;
use App\Models\ProjectDepartment;

class ProjectDeparmentRepository implements ProjectDeparmentRepositoryInterface {
    public function getAllDeparments() {
        return ProjectDepartment::all();
    }
}
