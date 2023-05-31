<?php
namespace App\Http\Livewire\Website;

use App\Repositories\GallaryProjectRepository;
use App\Repositories\GallaryProjectTypeRepository;
use Livewire\Component;

class Gallary extends Component
{
    // public $categories;
    // // public $projects;
    // protected $gallaryProjectRepository;
    // public $gallaryProjectTypeRepository;

    // * constructor
    public function __construct() {
        // $this->gallaryProjectRepository = new GallaryProjectRepository;
        // $this->gallaryProjectTypeRepository = new GallaryProjectTypeRepository;
        // $this->categories = $this->gallaryProjectTypeRepository->getAllTypes();
        // $this->projects = $this->gallaryProjectRepository->getAllProjects();
    }

    public function render()
    {
        return view('livewire.website.gallary');
    }
}
