<?php

namespace App\Http\Controllers\Api\Project;

use App\Helpers\Localizable;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProjectReplyStoreRequest;
use App\Interfaces\ProjectReplyRepositoryInterface;
use App\Interfaces\ProjectRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ProjectReplyController extends Controller
{
    use Localizable;

    protected ProjectRepositoryInterface $projectRepository;
    protected ProjectReplyRepositoryInterface $projectReplyRepository;
    protected Response $response;

    public function __construct(Response $response, ProjectRepositoryInterface $projectRepository, ProjectReplyRepositoryInterface $projectReplyRepository) {
        $this->projectRepository = $projectRepository;
        $this->projectReplyRepository = $projectReplyRepository;
        $this->response = $response;

        $this->setLocalization();
    }

    public function index($id) {

        try {

            $project = $this->projectRepository->getProjectById($id);

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

    public function store(ProjectReplyStoreRequest $request, $project_id) {
        // if fails
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->response->badRequest('Data is not valid!', $request->validator->errors(), $request->except(['files']));
        }

        DB::beginTransaction();
        try {

            $project = $this->projectRepository->getProjectById($project_id);

            if (!$project)
                return $this->response->notFound(obj: 'project');

            $reply = $this->projectReplyRepository->store($request, intval($project_id));

            DB::commit();

            return $this->response->created([
                'data' => $reply
            ], 'project reply');

        } catch (\Throwable $th) {

            DB::rollBack();
            return $this->response->internalServerError($th->getMessage());

        }
    }
}
