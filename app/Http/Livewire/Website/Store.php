<?php
namespace App\Http\Livewire\Website;
use App\Repositories\ReadyProjectDepartmentRepository;
use App\Repositories\ReadyProjectRepository;
use Livewire\Component;

class Store extends Component
{
    public $departments;
    public $ready_projects;
    public $active = 0;
    public $max_count = null;
    public $token;

    protected $readyProjectDepartmentRepository;
    protected $readyProjectRepository;

    public function __construct() {
        $this->readyProjectDepartmentRepository = new ReadyProjectDepartmentRepository;
        $this->readyProjectRepository = new ReadyProjectRepository;

        if (!session()->has('loaded'))
            session()->put('loaded', config('globals.store_pagination'));
    }

    public function mount($token=null) {
        $this->token = $token;
    }

    public function isAffiliate() {
        return is_null($this->token) ? false : true;
    }

    public function prepareProjectRoute($project_id) {
        return $this->isAffiliate() ?
            route('affiliate.project', [$this->token, $project_id]) :
            route('project', $project_id);
    }

    public function activate($id) {
        $this->active = $id;
        session()->put('loaded', config('globals.store_pagination'));
    }

    public function toggleLike($ready_project)
    {
        if(!auth()->check()){
            return redirect()->route('login');
        }

        $ready_project = $this->readyProjectRepository->findById($ready_project['id']);
        $isAdded = $this->readyProjectRepository->toggleLike($ready_project);

        if ($isAdded)
            $this->dispatchBrowserEvent('my:message.success', ['message' => __('messages.done')]);
        else
            $this->dispatchBrowserEvent('my:message.success', ['message' => __('messages.done')]);
    }

    public function loadMore() {
        if (session()->has('loaded'))
            session()->put('loaded', session('loaded') + config('globals.store_pagination'));
        else
            session()->put('loaded', config('globals.store_pagination'));
    }

    public function render()
    {
        $this->departments = $this->readyProjectDepartmentRepository->getAllDepartments();

        if ($this->active > 0) {
            $this->ready_projects = $this->readyProjectRepository->getReadyProjectsByDepartmentId(id: $this->active, max: session('loaded'));
            $this->max_count = $this->readyProjectRepository->count($this->active);
        }
        else {
            $this->ready_projects = $this->readyProjectRepository->getAllReadyProjects(max: session('loaded'));
            $this->max_count = $this->readyProjectRepository->count();
        }

        $this->dispatchBrowserEvent('my:loaded');
        return view('livewire.website.store');
    }
}
