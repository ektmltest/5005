<?php

namespace App\Http\Controllers\Api\ReadyProject;

use App\Helpers\Localizable;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RatingStoreRequest;
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

            $projects = $this->readyProjectRepository->getAllReadyProjects(paginate: request()->has('paginate'));

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

            if (!$project)
                return $this->response->notFound(obj: 'ready project');

            return $this->response->ok([
                'message' => 'Ready project!',
                'data' => $project,
            ]);

        } catch (\Throwable $th) {

            $this->response->internalServerError($th->getMessage());

        }

    }

    public function like($id) {

        try {

            $project = $this->readyProjectRepository->findById($id);

            if (!$project)
                return $this->response->notFound(obj: 'ready project');

            if ($this->readyProjectRepository->toggleLike($project))
                return $this->response->ok([
                    'message' => __('api/messages.ready_proj_like_added'),
                    'data' => $project,
                ]);
            else
                return $this->response->ok([
                    'message' => __('api/messages.ready_proj_like_removed'),
                    'data' => $project,
                ]);

        } catch (\Throwable $th) {

            $this->response->internalServerError($th->getMessage());

        }

    }

    public function rate(RatingStoreRequest $request, $id) {
        // if fails
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->response->badRequest('Data is not valid!', $request->validator->errors(), $request->except(['files']));
        }
        
        try {

            $project = $this->readyProjectRepository->findById($id);

            if (!$project)
                return $this->response->notFound(obj: 'ready project');

            if ($this->readyProjectRepository->setRate($project, $request->rating))
                return $this->response->created(
                    data: ['data' => $this->readyProjectRepository->findById($id)],
                    createdObj: 'rate',
                    msg: __('api/messages.ready_proj_rate_created')
                );
            else
                return $this->response->ok([
                    'message' => __('api/messages.ready_proj_rate_updated'),
                    'data' => $this->readyProjectRepository->findById($id),
                ]);

        } catch (\Throwable $th) {

            $this->response->internalServerError($th->getMessage());

        }

    }
}
