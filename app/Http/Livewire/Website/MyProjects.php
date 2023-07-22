<?php
namespace App\Http\Livewire\Website;

use App\Models\ProjectState;
use App\Repositories\ProjectAttachmentRepository;
use App\Repositories\ProjectCategoryRepository;
use App\Repositories\ProjectReplyAttachmentRepository;
use App\Repositories\ProjectReplyRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\ProjectStateRepository;
use Livewire\Component;

class MyProjects extends Component
{
    public $currentState = null;
    public $projectStates;
    public $allProjects;
    public $projectsToDisplay;
    protected $projectStateRepository;
    protected $projectRepository;

    public function __construct() {
        $this->projectStateRepository = new ProjectStateRepository;
        $this->projectRepository = new ProjectRepository(
            new ProjectAttachmentRepository,
            new ProjectReplyRepository(new ProjectReplyAttachmentRepository)
        );
        $this->allProjects = $this->projectRepository->getAllProjects(auth: true);
        $this->projectStates = $this->projectStateRepository->getAllProjectStates();
        $this->projectsToDisplay = $this->allProjects;
    }

    public function switchState(ProjectState $state) {
        if (isset($state->id)) {
            $this->currentState = $state;
            $this->projectsToDisplay = $state->projects->where('user_id', auth()->user()->id);
        }
        else {
            $this->currentState = null;
            $this->projectsToDisplay = $this->allProjects;
        }
        $this->dispatchBrowserEvent('my:loaded');
    }

    public function render()
    {
        return view('livewire.website.my-projects');
    }
}
