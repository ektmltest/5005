<?php

namespace App\Http\Controllers\Api\Project;

use App\Helpers\Localizable;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Interfaces\ProjectDepartmentRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectDepartmentController extends Controller
{
    use Localizable;

    protected ProjectDepartmentRepositoryInterface $projectDepartmentRepository;
    protected Response $response;

    public function __construct(Response $response, ProjectDepartmentRepositoryInterface $projectDepartmentRepository) {
        $this->projectDepartmentRepository = $projectDepartmentRepository;
        $this->response = $response;

        $this->setLocalization();
    }

    public function index() {

        try {

            $departments = $this->projectDepartmentRepository->getAllDeparments();

            return $this->response->ok([
                'message' => 'All departments!',
                'data' => $departments,
            ]);

        } catch (\Throwable $th) {

            $this->response->internalServerError($th->getMessage());

        }

    }

    public function show($id) {

        try {

            $department = $this->projectDepartmentRepository->getDepartmentById($id);

            return $this->response->ok([
                'message' => 'Department!',
                'data' => $department,
            ]);

        } catch (\Throwable $th) {

            $this->response->internalServerError($th->getMessage());

        }
    }
}
