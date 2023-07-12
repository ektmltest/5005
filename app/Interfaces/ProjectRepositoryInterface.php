<?php

namespace App\Interfaces;

use App\Models\Project;

interface ProjectRepositoryInterface {

    public function getProjectById($id, $auth = false);

    public function getAllProjects($auth = false, $max = null);

    public function store(Project $project, $files, $categories);

    public function delete(Project $project);

    public function prepareProject($data): Project;

}
