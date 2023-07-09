<?php

namespace App\Http\Livewire\Admin;

use App\Repositories\ReadyProjectDepartmentRepository;
use Livewire\Component;

class StoreDepartment extends Component
{
    public $departments;

    private $readyProjectDepartmentRepository;

    public function __construct() {
        $this->readyProjectDepartmentRepository = new ReadyProjectDepartmentRepository;
        $this->departments = $this->readyProjectDepartmentRepository->getAllDepartments();
    }

    public function render()
    {
        return view('livewire.admin.store-department');
    }
}
