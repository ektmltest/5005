<?php

namespace App\Http\Controllers\Admin;

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
        return view('admin.dashboard', [
            'users' => $this->userRepository->getAll(max: 10),
            'projects' => $this->projectRepository->getAllProjects(max: 10),
        ]);
    }
}
