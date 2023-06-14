<?php

namespace App\Interfaces;

interface ProjectCategoryRepositoryInterface {
    public function getAllCategories();

    public function getCategoryById($id);
}
