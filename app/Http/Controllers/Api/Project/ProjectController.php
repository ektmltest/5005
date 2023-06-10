<?php

namespace App\Http\Controllers\Api\Project;

use App\Helpers\Localizable;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectStoreRequest;
use App\Interfaces\ProjectRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    use Localizable;

    protected $projectRepository;
    protected $response;

    public function __construct(Response $response, ProjectRepositoryInterface $projectRepository) {
        $this->projectRepository = $projectRepository;
        $this->response = $response;

        $this->setLocalization();
    }

    public function index() {

        try {

            $projects = $this->projectRepository->getAllProjects(auth: true);

            return $this->response->ok([
                'message' => 'All my projects!',
                'data' => $projects,
            ]);

        } catch (\Throwable $th) {

            return $this->response->internalServerError($th->getMessage());

        }

    }

    public function show($id) {

        try {

            $project = $this->projectRepository->getProjectById($id, auth: true);

            if (!$project)
                return $this->response->notFound(obj: 'project');

            return $this->response->ok([
                'message' => 'Your project!',
                'data' => $project,
            ]);

        } catch (\Throwable $th) {

            return $this->response->internalServerError($th->getMessage());

        }

    }

    public function store(ProjectStoreRequest $request) {
        // if fails
        if(isset($request->validator) && $request->validator->fails()) {
            return $this->response->badRequest('Data is not valid!', $request->validator->errors(), $request->except(['password', 'password_confirmation']));
        }

        DB::beginTransaction();
        try {

            // TODO

        } catch (\Throwable $th) {

            DB::rollBack();
            return $this->response->internalServerError($th->getMessage());

        }

    }
}
