<?php

namespace App\Http\Controllers\Api\ReadyProject;

use App\Helpers\Localizable;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Interfaces\ReadyProjectRepositoryInterface;
use Illuminate\Http\Request;

class ReadyProjectController extends Controller
{
    use Localizable;
    protected ReadyProjectRepositoryInterface $readyProjectRepository;
    protected Response $response;

    public function __construct(Response $response, ReadyProjectRepositoryInterface $readyProjectRepository) {
        $this->response = $response;
        $this->readyProjectRepository = $readyProjectRepository;

        $this->setLocalization();
    }

    public function index() {

        try {

            $projects = $this->readyProjectRepository->getAllReadyProjects();

            return $this->response->ok([
                'message' => 'All ready projects (store projects)!',
                'data' => $projects,
            ]);

        } catch (\Throwable $th) {

            $this->response->internalServerError($th->getMessage());

        }

    }

    public function show($id) {

        try {

            $project = $this->readyProjectRepository->findById($id);

            return $this->response->ok([
                'message' => 'Ready project!',
                'data' => $project,
            ]);

        } catch (\Throwable $th) {

            $this->response->internalServerError($th->getMessage());

        }

    }
}
