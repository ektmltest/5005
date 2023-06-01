<?php
namespace App\Http\Livewire\Website;

use App\Repositories\ReadyProjectRepository;
use Livewire\Component;

class Like extends Component
{
    public $ready_projects;
    protected $readyProjectRepository;

    public function __construct() {
        $this->readyProjectRepository = new ReadyProjectRepository;
    }

    public function toggleLike($ready_project)
    {
        if(!auth()->check()){
            return redirect()->route('login');
        }

        $ready_project = $this->readyProjectRepository->findById($ready_project['id']);
        $isAdded = $this->readyProjectRepository->toggleLike($ready_project);

        if ($isAdded)
            session()->flash('message', 'Like Added Successfully');
        else
            session()->flash('message', 'Like Removed Successfully');
    }

    public function render()
    {
        $this->ready_projects = $this->readyProjectRepository->getAllReadyProjects();
        return view('livewire.website.like');
    }
}
