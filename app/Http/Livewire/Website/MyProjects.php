<?php
namespace App\Http\Livewire\Website;

use App\Models\ProjectState;
use App\Repositories\ProjectRepository;
use App\Repositories\ProjectStateRepository;
use Livewire\Component;

class MyProjects extends Component
{
    public $currentState;

    public $projectStates;

    protected $projectStateRepository;

    public function __construct() {
        $this->projectStateRepository = new ProjectStateRepository;
    }

    public function switchState(ProjectState $state) {
        $this->currentState = $state;
    }

    public function render()
    {
        $this->projectStates = $this->projectStateRepository->getAllProjectStates();
        $this->currentState = $this->projectStates->first();
        return view('livewire.website.my-projects');
    }
}
