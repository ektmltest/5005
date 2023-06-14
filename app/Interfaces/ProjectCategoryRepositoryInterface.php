<?php

namespace App\Interfaces;

interface ProjectCategoryRepositoryInterface {
    public function getAllCategories();

    public function getCategoryById($id);

    public function getCategoriesByIds($ids);

    public function storeToPivotBulk($categories, $project);
}
