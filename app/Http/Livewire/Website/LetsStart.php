<?php
namespace App\Http\Livewire\Website;

use App\Repositories\ProjectCategoryRepository;
use App\Repositories\ProjectDepartmentRepository;
use Livewire\Component;

class LetsStart extends Component
{
    public $departments;
    public $categories = null;
    public $selectedDeptId = null;
    public $categoryIds = [];
    public $categoryHasClass = [];
    public $showDepartments = true;
    public $showCategories = false;
    public $showForm = false;
    public $noFiles = 1;
    protected $projectDepartmentRepository;

    public function __construct() {
        $this->projectDepartmentRepository = new ProjectDepartmentRepository;
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

    public function render()
    {
        $this->departments = $this->projectDepartmentRepository->getAllDeparments();
        return view('livewire.website.lets-start');
    }
}
