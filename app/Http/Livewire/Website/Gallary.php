<?php
namespace App\Http\Livewire\Website;

use App\Repositories\GallaryProjectRepository;
use App\Repositories\GallaryProjectTypeRepository;
use Livewire\Component;

class Gallary extends Component
{
    public $categories;
    public $projects;
    public $active = 0;
    public $max_count = null;

    protected $gallaryProjectRepository;
    protected $gallaryProjectTypeRepository;

    // * constructor
    public function __construct() {
        $this->gallaryProjectRepository = new GallaryProjectRepository;
        $this->gallaryProjectTypeRepository = new GallaryProjectTypeRepository;

        if (!session()->has('loaded'))
            session()->put('loaded', config('globals.store_pagination'));
    }

    public function activate($id) {
        $this->active = $id;
        session()->put('loaded', config('globals.store_pagination'));
    }

    public function loadMore() {
        if (session()->has('loaded'))
            session()->put('loaded', session('loaded') + config('globals.store_pagination'));
        else
            session()->put('loaded', config('globals.store_pagination'));
    }

    public function render()
    {
        $this->categories = $this->gallaryProjectTypeRepository->getAllTypes();

        if ($this->active > 0) {
            $this->projects = $this->gallaryProjectRepository->getProjectsByCategoryId(category_id: $this->active, limit: session('loaded'));
            $this->max_count = $this->gallaryProjectRepository->count($this->active);
        }
        else {
            $this->projects = $this->gallaryProjectRepository->getAllProjects(limit: session('loaded'));
            $this->max_count = $this->gallaryProjectRepository->count();
        }

        $this->dispatchBrowserEvent('my:loaded');
        return view('livewire.website.gallary');
    }
}
