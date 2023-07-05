<?php

namespace App\Http\Livewire\Admin;

use App\Repositories\AddonRepository;
use App\Repositories\ReadyProjectDepartmentRepository;
use Livewire\Component;

class ReadyProjectCreate extends Component
{
    public $departments;
    public $addons;

    private $readyProjectDepartmentRepository;
    private $addonRepository;

    public function __construct() {
        $this->readyProjectDepartmentRepository = (new ReadyProjectDepartmentRepository);
        $this->addonRepository = (new AddonRepository);

        $this->departments = $this->readyProjectDepartmentRepository->getAllDepartments();
        $this->addons = $this->addonRepository->getAll();
    }

    public function render()
    {
        return view('livewire.admin.ready-project-create');
    }
}
