<?php
namespace App\Http\Livewire\Website;

use App\Http\Requests\ProjectStoreRequest;
use App\Models\Project;
use App\Repositories\ProjectAttachmentRepository;
use App\Repositories\ProjectCategoryRepository;
use App\Repositories\ProjectDepartmentRepository;
use App\Repositories\ProjectReplyAttachmentRepository;
use App\Repositories\ProjectReplyRepository;
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
    public $categoryNames = [];
    public $categoryActive = [];
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
        $this->projectRepository = new ProjectRepository(
            new ProjectAttachmentRepository,
            new ProjectCategoryRepository,
            new ProjectReplyRepository(new ProjectReplyAttachmentRepository)
        );
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

    public function toggleActive($cat_id, $cat_name) {
        if (isset($this->categoryActive[$cat_id])) {
            unset($this->categoryActive[$cat_id]);
            $key = array_search($cat_id, $this->categoryIds);
            unset($this->categoryIds[$key]);
            $key = array_search($cat_name, $this->categoryNames);
            unset($this->categoryNames[$key]);
        } else {
            $this->categoryActive[$cat_id] = true;
            $this->categoryIds[] = $cat_id;
            $this->categoryNames[] = $cat_name;
        }
    }

    public function displayForm() {
        if (empty($this->categoryIds)) {

            $this->addError('selectCategory', 'Please select a category');

        } else {

            $this->showCategories = false;
            $this->showDepartments = false;
            $this->showForm = true;

        }
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

    public function displayBack($showDeptSec, $showCateSec, $showFormSec) {
        if (!$showCateSec)
            $this->reset();
        $this->showCategories = $showCateSec;
        $this->showDepartments = $showDeptSec;
        $this->showForm = $showFormSec;
    }

    public function submit() {
        $this->validate();

        $this->projectRepository->store($this->project, $this->files, $this->categories);

        $this->reset();
        session()->flash('message', 'Project Created Successfully.!');
    }

    public function render()
    {
        $this->departments = $this->projectDepartmentRepository->getAllDeparments();
        return view('livewire.website.lets-start');
    }
}
