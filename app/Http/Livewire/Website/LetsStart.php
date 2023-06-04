<?php
namespace App\Http\Livewire\Website;

use App\Http\Requests\ProjectStoreRequest;
use App\Models\Project;
use App\Repositories\ProjectAttachmentRepository;
use App\Repositories\ProjectCategoryRepository;
use App\Repositories\ProjectDepartmentRepository;
use App\Repositories\ProjectRepository;
use Livewire\Component;
use Livewire\WithFileUploads;

class LetsStart extends Component
{
    use WithFileUploads;

    public $departments;
    public $categories = null;
    public $selectedDeptId = null;
    public $categoryIds = [];
    public $categoryHasClass = [];
    public $showDepartments = true;
    public $showCategories = false;
    public $showForm = false;
    public $noFiles = 1;
    // ** FORM DATA ** //
    public Project $project;
    public $files = array();
    // ** END FORM DATA ** //
    protected $projectDepartmentRepository;
    protected $projectRepository;

    public function __construct() {
        $this->projectDepartmentRepository = new ProjectDepartmentRepository;
        $this->projectRepository = new ProjectRepository(new ProjectAttachmentRepository);
        $this->project = new Project;
    }

    public function departmentCategories($dept_id) {
        $this->selectedDeptId = $dept_id;
        $this->categories = $this->projectDepartmentRepository->getDepartmentCategories($dept_id);

        // dd($this->categories);

        $this->showCategories = true;
        $this->showDepartments = false;
        $this->showForm = false;
    }

    public function toggleActive($cat_id) {
        if (isset($this->categoryHasClass[$cat_id])) {
            unset($this->categoryHasClass[$cat_id]);
            $key = array_search($cat_id, $this->categoryIds);
            unset($this->categoryIds[$key]);
        } else {
            $this->categoryHasClass[$cat_id] = true;
            $this->categoryIds[] = $cat_id;
        }
    }

    public function displayForm() {
        $this->showCategories = false;
        $this->showDepartments = false;
        $this->showForm = true;
    }

    public function addBtn() {
        $this->noFiles++;
    }

    // * to define rules for all post requests comming to this component
    public function rules(): array
    {
        return (new ProjectStoreRequest)->rules();
    }

    // * to handle realtime validation on single properity at a time
    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function submit() {
        $this->validate();

        $this->projectRepository->store($this->project, $this->files);

        $this->reset();
        session()->flash('message', 'Project Created Successfully.!');
    }

    public function render()
    {
        $this->departments = $this->projectDepartmentRepository->getAllDeparments();
        return view('livewire.website.lets-start');
    }
}
