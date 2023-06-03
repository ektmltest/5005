<?php

namespace App\Interfaces;

interface ProjectDepartmentRepositoryInterface {
    public function getAllDeparments();

    public function getDepartmentCategories($id);
}
