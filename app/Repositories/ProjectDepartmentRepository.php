<?php

namespace App\Repositories;

use App\Interfaces\ProjectDepartmentRepositoryInterface;
use App\Interfaces\ProjectRepositoryInterface;
use App\Models\ProjectDepartment;

class ProjectDepartmentRepository implements ProjectDepartmentRepositoryInterface {

    protected $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository) {
        $this->projectRepository = $projectRepository;
    }

    public function getDepartmentById($id) {
        return ProjectDepartment::find($id);
    }

    public function getAllDeparments($paginate = false, $num = 10) {
        if ($paginate)
            return ProjectDepartment::orderBy('created_at', 'DESC')->paginate($num);
        else
            return ProjectDepartment::orderBy('created_at', 'DESC')->get();
    }

    public function getDepartmentCategories($id) {
        return ProjectDepartment::find($id)->categories;
    }

    public function checkCategoriesDependency($department, $categories) {
        foreach ($categories as $category) {
            if ($category->project_department_id != $department->id)
                return false;
        }
        return true;
    }

    public function delete($id) {
        // * we delete projects of the department for deleting the attachments as well.
        $this->projectRepository->deleteByDepartment($id);

        // * categories deleted by cascading as well.
        return ProjectDepartment::destroy($id);
    }
}
