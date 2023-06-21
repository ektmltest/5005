<?php

namespace App\Http\Livewire\Website;

use App\Repositories\ProjectAttachmentRepository;
use App\Repositories\ProjectCategoryRepository;
use App\Repositories\ProjectRepository;
use Livewire\Component;

class MyProjectShow extends Component
{
    public $project;
    protected $projectRepository;

    public function __construct() {
        $this->projectRepository = new ProjectRepository(new ProjectAttachmentRepository, new ProjectCategoryRepository);
    }

    public function mount($id) {
        $this->project = $this->projectRepository->getProjectById($id);
    }

    public function delete() {
        $this->projectRepository->delete($this->project);

        return redirect()->route('myProjects')->with('message', 'Project deleted successfully!');
    }

    public function render()
    {
        return view('livewire.website.my-project-show');
    }
}
