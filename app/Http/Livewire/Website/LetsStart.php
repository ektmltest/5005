<?php
namespace App\Http\Livewire\Website;

use App\Repositories\ProjectCategoryRepository;
use App\Repositories\ProjectDeparmentRepository;
use Livewire\Component;

class LetsStart extends Component
{
    public $departments;
    protected $projectDepartmentRepository;

    public function __construct() {
        $this->projectDepartmentRepository = new ProjectDeparmentRepository;
    }

    public function render()
    {
        $this->departments = $this->projectDepartmentRepository->getAllDeparments();
        return view('livewire.website.lets-start');
    }
}
