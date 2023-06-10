<?php

namespace App\Http\Controllers;

use App\Interfaces\ProjectDepartmentRepositoryInterface;

class ProjectDepartmentController extends Controller
{
    protected $projectDepartmentRepository;

    public function __construct(ProjectDepartmentRepositoryInterface $projectDepartmentRepository) {
        $this->projectDepartmentRepository = $projectDepartmentRepository;
    }

    public function index() {
        return $this->projectDepartmentRepository->getAllDeparments();
    }

    public function show($id) {
        return $this->projectDepartmentRepository->getDepartmentCategories($id);
    }
}
