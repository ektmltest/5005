<?php
namespace App\Http\Livewire\Website;
use App\Models\ReadyProject;
use App\Repositories\GallaryProjectRepository;
use App\Repositories\ReadyProjectRepository;
use App\Repositories\Settings\SocialMediaRepository;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Project extends Component
{
    public $project;
    public $next;
    public $previous;
    public $galleries;
    public $socials;

    protected $readyProjectRepository;
    protected $galleryProjectRepository;
    protected $socialMediaRepository;

    public function __construct() {
        $this->readyProjectRepository = new ReadyProjectRepository;
        $this->galleryProjectRepository = new GallaryProjectRepository;
        $this->socialMediaRepository = new SocialMediaRepository;

        $this->galleries = $this->galleryProjectRepository->getAllProjects(paginate: false, limit: 9);
        $this->socials = $this->socialMediaRepository->getAll();
    }

    public function mount($id) {
        $this->project = $this->readyProjectRepository->findById($id);
        $this->next = $this->readyProjectRepository->getNextId($id);
        $this->previous = $this->readyProjectRepository->getPreviousId($id);
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

    public function render()
    {
        $this->dispatchBrowserEvent('my:loaded');
        return view('livewire.website.project');
    }
}
