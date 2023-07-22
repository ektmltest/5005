<?php

namespace App\Repositories;

use App\Interfaces\ProjectCategoryRepositoryInterface;
use App\Interfaces\ProjectRepositoryInterface;
use App\Models\ProjectCategory;
use Illuminate\Support\Facades\DB;

class ProjectCategoryRepository implements ProjectCategoryRepositoryInterface {

    protected $projectRepository;
    public function __construct(ProjectRepositoryInterface $projectRepository) {
        $this->projectRepository = $projectRepository;
    }

    public function getAllCategories($paginate = false, $num = 10) {
        if ($paginate)
            return ProjectCategory::orderBy('created_at', 'DESC')->paginate($num);
        else
            return ProjectCategory::orderBy('created_at', 'DESC')->get();
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

    public static function storeToPivotBulk($categories, $project) {
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

    public function store($data) {
        return ProjectCategory::create([
            'name' => [
                'en' => $data['name_en'],
                'ar' => $data['name_ar'],
            ],
            'icon' => $data['icon'],
            'unicode' => $data['unicode'],
            'start_price' => $data['price'],
            'color' => $data['color'],
            'project_department_id' => $data['dept_id'],
        ]);
    }

    public function update($data, $id) {
        $category = $this->getCategoryById($id);
        $category->update([
            'name' => [
                'en' => $data['name_en'],
                'ar' => $data['name_ar'],
            ],
            'icon' => $data['icon'],
            'unicode' => $data['unicode'],
            'start_price' => $data['price'],
            'color' => $data['color'],
            'project_department_id' => $data['dept_id'],
        ]);

        return $category;
    }

    public function delete($id) {
        // * we delete projects of the department for deleting the attachments as well.
        $this->projectRepository->deleteByCategory($id);

        // * categories deleted by cascading as well.
        return ProjectCategory::destroy($id);
    }
}
