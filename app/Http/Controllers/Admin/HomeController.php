<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Url;
use App\Http\Controllers\Controller;
use App\Interfaces\ProjectRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $userRepository;
    protected $projectRepository;

    public function __construct(UserRepositoryInterface $userRepository, ProjectRepositoryInterface $projectRepository) {
        $this->userRepository = $userRepository;
        $this->projectRepository = $projectRepository;
    }

    public function index() {
        if (request()->has('redirect')) {

            $localePrefix = Url::prepareLocalePrefix();
            return redirect($localePrefix . 'admin/' . request()->get('redirect'));

        } else {

            return view('admin.dashboard', [
                'users' => $this->userRepository->getAll(max: 10),
                'projects' => $this->projectRepository->getAllProjects(max: 10),
            ]);

        }
    }
}
