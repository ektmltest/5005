<?php

namespace App\Http\Controllers\Api\Project;

use App\Helpers\Localizable;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Interfaces\ProjectCategoryRepositoryInterface;
use Illuminate\Http\Request;

class ProjectCategoryController extends Controller
{
    use Localizable;

    protected ProjectCategoryRepositoryInterface $projectCategoryRepository;
    protected Response $response;

    public function __construct(Response $response, ProjectCategoryRepositoryInterface $projectCategoryRepository) {
        $this->projectCategoryRepository = $projectCategoryRepository;
        $this->response = $response;

        $this->setLocalization();
    }

    public function index() {

        try {

            $categories = $this->projectCategoryRepository->getAllCategories();

            return $this->response->ok([
                'message' => 'All categories!',
                'data' => $categories,
            ]);

        } catch (\Throwable $th) {

            $this->response->internalServerError($th->getMessage());

        }

    }

    public function show($id) {

        try {

            $category = $this->projectCategoryRepository->getCategoryById($id);

            return $this->response->ok([
                'message' => 'Category!',
                'data' => $category,
            ]);

        } catch (\Throwable $th) {

            $this->response->internalServerError($th->getMessage());

        }
    }
}
