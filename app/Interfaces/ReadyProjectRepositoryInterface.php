<?php

namespace App\Interfaces;

interface ReadyProjectRepositoryInterface {

    public function getAllReadyProjects();

    public function findById($id);

    

}
