<?php

namespace App\Interfaces;

interface ReadyProjectRepositoryInterface {

    public function getAllReadyProjects($paginate = false, $num = 5);

    public function findById($id);

    public function toggleLike($ready_project);

}
