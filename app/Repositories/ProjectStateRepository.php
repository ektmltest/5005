<?php

namespace App\Repositories;

use App\Interfaces\ProjectStateRepositoryInterface;
use App\Models\ProjectState;

class ProjectStateRepository implements ProjectStateRepositoryInterface {
    public function getAllProjectStates() {
        return ProjectState::all();
    }

    public function getProjectStateById($id) {
        return ProjectState::with('projects')->find($id);
    }
}
