<?php

namespace App\Repositories;

use App\Interfaces\ProjectCategoryRepositoryInterface;
use App\Models\ProjectCategory;
use Illuminate\Support\Facades\DB;

class ProjectCategoryRepository implements ProjectCategoryRepositoryInterface {
    public function getAllCategories() {
        return ProjectCategory::all();
    }

    public function getCategoryById($id) {
        return ProjectCategory::find($id);
    }

    public function getCategoriesByIds($ids) {
        $categories = [];
        foreach ($ids as $id) {
            $categories[] = $this->getCategoryById(intval($id));
        }

        return $categories;
    }

    public function storeToPivotBulk($categories, $project) {
        $dataToInsert = [];
        foreach ($categories as $category) {
            $dataToInsert[] = [
                'project_id' => $project->id,
                'project_category_id' => $category->id,
            ];
        }

        DB::table('project_pivot_categories')
            ->insert($dataToInsert);
    }
}
