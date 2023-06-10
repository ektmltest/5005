<?php

namespace App\Http\Controllers\Api\GalleryProject;

use App\Helpers\Localizable;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Interfaces\GallaryProjectRepositoryInterface;
use Illuminate\Http\Request;

class GalleryProjectController extends Controller
{
    use Localizable;
    protected GallaryProjectRepositoryInterface $galleryProjectRepository;
    protected Response $response;

    public function __construct(Response $response, GallaryProjectRepositoryInterface $gallaryProjectRepository) {
        $this->response = $response;
        $this->galleryProjectRepository = $gallaryProjectRepository;

        $this->setLocalization();
    }

    public function index() {

        try {

            $projects = $this->galleryProjectRepository->getAllProjects(paginate: request()->has('paginate'));

            return $this->response->ok([
                'message' => 'All gallery projects!',
                'data' => $projects,
            ]);

        } catch (\Throwable $th) {

            $this->response->internalServerError($th->getMessage());

        }

    }

    public function show($id) {

        try {

            $project = $this->galleryProjectRepository->getProjectById($id);

            return $this->response->ok([
                'message' => 'Gallery project!',
                'data' => $project,
            ]);

        } catch (\Throwable $th) {

            $this->response->internalServerError($th->getMessage());

        }

    }
}
