<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Repositories\ReadyProjectRepository;

class ReadyProject extends Component
{
    public $ready_projects = [];

    protected $readyProjectRepository;

    public function __construct() {
        $this->readyProjectRepository = (new ReadyProjectRepository());
        $this->ready_projects = $this->readyProjectRepository->getAllReadyProjects();
    }

    public function render()
    {
        return view('livewire.admin.ready-project');
    }
}
