<?php

namespace App\Interfaces;

use App\Models\ReadyProject;

interface ReadyProjectRepositoryInterface {

    public function getAllReadyProjects($paginate = false, $num = 5);

    public function findById($id);

    public function toggleLike($ready_project);

    public function setRate(ReadyProject $ready_project, $rating);

}
