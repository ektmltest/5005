<?php

namespace App\Http\Livewire\Admin;

use App\Models\ReadyProject;
use App\Repositories\AddonRepository;
use App\Repositories\FacilityRepository;
use App\Repositories\ReadyProjectDepartmentRepository;
use App\Repositories\ReadyProjectRepository;
use App\Repositories\TagRepository;
use Livewire\Component;
use Livewire\WithFileUploads;

class ReadyProjectEdit extends Component
{
    use WithFileUploads;

    public $departments;
    public $addons;
    public $facilities;
    public $tags;
    public ReadyProject $project;
    public $name_ar;
    public $name_en;
    public $price;
    public $tax;
    public $link;
    public $short_desc_ar;
    public $short_desc_en;
    public $desc_ar;
    public $desc_en;

    private $readyProjectRepository;
    private $readyProjectDepartmentRepository;
    private $addonRepository;
    private $facilityRepository;
    private $tagRepository;

    public function __construct() {
        $this->readyProjectRepository = (new ReadyProjectRepository);
        $this->readyProjectDepartmentRepository = (new ReadyProjectDepartmentRepository);
        $this->addonRepository = (new AddonRepository);
        $this->facilityRepository = (new FacilityRepository);
        $this->tagRepository = (new TagRepository);

        $this->departments = $this->readyProjectDepartmentRepository->getAllDepartments();
        $this->addons = $this->addonRepository->getAll();
        $this->facilities = $this->facilityRepository->getAll();
        $this->tags = $this->tagRepository->getAll();
    }

    public function mount($id) {
        $this->project = $this->readyProjectRepository->findById($id);
        $this->name_ar = $this->project->nameLocale('ar');
        $this->name_en = $this->project->nameLocale('en');
    }

    public function render()
    {
        return view('livewire.admin.ready-project-edit');
    }
}
