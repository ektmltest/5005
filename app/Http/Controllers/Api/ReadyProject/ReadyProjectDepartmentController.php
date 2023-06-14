<?php

namespace App\Http\Controllers\Api\ReadyProject;

use App\Helpers\Localizable;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Interfaces\ReadyProjectDepartmentRepositoryInterface;
use Illuminate\Http\Request;

class ReadyProjectDepartmentController extends Controller
{
    use Localizable;
    protected ReadyProjectDepartmentRepositoryInterface $readyProjectDepartmentRepository;
    protected Response $response;

    public function __construct(Response $response, ReadyProjectDepartmentRepositoryInterface $readyProjectDepartmentRepository) {
        $this->response = $response;
        $this->readyProjectDepartmentRepository = $readyProjectDepartmentRepository;

        $this->setLocalization();
    }

    public function index() {

        try {

            $departments = $this->readyProjectDepartmentRepository->getAllDepartments();

            return $this->response->ok([
                'message' => 'All ready project departments (store departments)!',
                'data' => $departments,
            ]);

        } catch (\Throwable $th) {

            $this->response->internalServerError($th->getMessage());

        }

    }

    public function show($id) {

        try {

            $department = $this->readyProjectDepartmentRepository->getDepartmentById($id);

            if (!$department)
                return $this->response->notFound(obj: 'department');

            return $this->response->ok([
                'message' => 'Ready project department (store department)!',
                'data' => $department,
            ]);

        } catch (\Throwable $th) {

            $this->response->internalServerError($th->getMessage());

        }

    }
}
