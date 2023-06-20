<?php

namespace App\Http\Controllers\Api\Project;

use App\Helpers\Localizable;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProjectStoreRequest;
use App\Interfaces\ProjectCategoryRepositoryInterface;
use App\Interfaces\ProjectDepartmentRepositoryInterface;
use App\Interfaces\ProjectRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    use Localizable;

    protected $projectRepository;
    protected $projectDepartmentRepository;
    protected $projectCategoryRepository;
    protected $response;

    public function __construct(
        Response $response,
        ProjectRepositoryInterface $projectRepository,
        ProjectDepartmentRepositoryInterface $projectDepartmentRepository,
        ProjectCategoryRepositoryInterface $projectCategoryRepository
    ) {
        $this->projectRepository = $projectRepository;
        $this->projectDepartmentRepository = $projectDepartmentRepository;
        $this->projectCategoryRepository = $projectCategoryRepository;
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
            return $this->response->badRequest(__('api/validation.data_not_valid'), $request->validator->errors(), $request->except(['files']));
        }

        DB::beginTransaction();
        try {

            $department = $this->projectDepartmentRepository->getDepartmentById(intval($request->department));
            $categories = $this->projectCategoryRepository->getCategoriesByIds($request->categories);

            // * checkCategoriesDependency is for check if categories are
            // * compitable for the department entered by the user of the API
            if (!$this->projectDepartmentRepository->checkCategoriesDependency($department, $categories))
                return $this->response->badRequest(
                    __('api/validation.data_not_valid'),
                    ['categories' => __('api/validation.cat_dept_not_compatible')],
                    $request->except(['files'])
                );

            $project = $this->projectRepository->prepareProject($request->only(['name', 'description']));

            $this->projectRepository->store($project, $request->file()['files'], $categories);

            DB::commit();

            return $this->response->created([
                'data' => $this->projectRepository->getProjectById($project->id)
            ], 'project');

        } catch (\Throwable $th) {

            DB::rollBack();
            return $this->response->internalServerError($th->getMessage());

        }

    }
}
