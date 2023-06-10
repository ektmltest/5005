<?php

namespace App\Http\Controllers\Api\Project;

use App\Helpers\Localizable;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Interfaces\ProjectRepositoryInterface;

class ProjectReplyController extends Controller
{
    use Localizable;

    protected ProjectRepositoryInterface $projectRepository;
    protected Response $response;

    public function __construct(Response $response, ProjectRepositoryInterface $projectRepository) {
        $this->projectRepository = $projectRepository;
        $this->response = $response;

        $this->setLocalization();
    }

    public function index($id) {

        try {

            $project = $this->projectRepository->getProjectById($id, auth: true);

            if (!$project)
                return $this->response->notFound(obj: 'project');

            return $this->response->ok([
                'message' => 'All project replies!',
                'data' => $project->replies,
            ]);

        } catch (\Throwable $th) {

            return $this->response->internalServerError($th->getMessage());

        }

    }

    public function show() {

    }
}
