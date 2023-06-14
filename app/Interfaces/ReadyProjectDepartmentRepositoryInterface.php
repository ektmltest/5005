<?php

namespace App\Interfaces;

interface ReadyProjectDepartmentRepositoryInterface {
    public function getAllDepartments();

    public function getDepartmentById($id);
}
