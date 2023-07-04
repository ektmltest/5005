<?php

namespace App\Http\Livewire\Admin;

use App\Models\ReadyProject;
use App\Repositories\ReadyProjectRepository;
use Livewire\Component;

class ReadyProjectEdit extends Component
{
    public ReadyProject $ready_project;

    private $readyProjectRepository;

    public function __construct() {
        $this->readyProjectRepository = new ReadyProjectRepository;
    }

    public function mount($id) {
        $this->ready_project = $this->readyProjectRepository->findById($id);
    }

    public function render()
    {
        return view('livewire.admin.ready-project-edit');
    }
}
