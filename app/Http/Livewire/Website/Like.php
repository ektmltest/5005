<?php
namespace App\Http\Livewire\Website;

use App\Repositories\ReadyProjectRepository;
use Livewire\Component;
use Livewire\WithPagination;

class Like extends Component
{
    protected $max = null;
    protected $active_department_id = 0;
    protected $readyProjectRepository;
    protected $listeners = [
        // 'likedEventHandled' => 'likedEventHandledHandler',
        'activateEvent' => 'activateEventHandler',
        'resetValueOfMaxEvent' => 'setValueOfMaxEventHandler',
    ];

    public function __construct() {
        $this->readyProjectRepository = new ReadyProjectRepository;
    }

    public function mount($max = null) {
        $this->max = $max;
    }

    public function toggleLike($ready_project)
    {
        if(!auth()->check()){
            return redirect()->route('login');
        }

        $ready_project = $this->readyProjectRepository->findById($ready_project['id']);
        $isAdded = $this->readyProjectRepository->toggleLike($ready_project);

        if ($isAdded)
            session()->flash('message', __('messages.done'));
        else
            session()->flash('message', __('messages.done'));

        $this->emit('likedEvent');
    }

    public function activateEventHandler($id) {
        $this->active_department_id = $id;
    }

    public function setValueOfMaxEventHandler($max) {
        $this->max = $max;
    }

    public function render()
    {
        if ($this->max)
            $projects = $this->readyProjectRepository->getAllReadyProjects(max: $this->max);
        else
            $projects = $this->active_department_id == 0 ? $this->readyProjectRepository->getAllReadyProjects() : $this->readyProjectRepository->getReadyProjectsByDepartmentId($this->active_department_id);
        $this->dispatchBrowserEvent('my:loaded');
        return view('livewire.website.like', [
            'ready_projects' => $projects,
        ]);
    }
}
