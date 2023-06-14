<?php

namespace App\Interfaces;

interface ProjectDepartmentRepositoryInterface {

    public function getDepartmentById($id);

    public function getAllDeparments();

    public function getDepartmentCategories($id);

    public function checkCategoriesDependency($department, $categories);
}
