<?php

namespace App\Http\Livewire\Admin;

use App\Helpers\Template;
use App\Http\Requests\Admin\ReadyProjectStoreRequest;
use App\Repositories\AddonRepository;
use App\Repositories\FacilityRepository;
use App\Repositories\ReadyProjectDepartmentRepository;
use App\Repositories\ReadyProjectRepository;
use App\Repositories\TagRepository;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class ReadyProjectCreate extends Component
{
    use WithFileUploads;

    public $departments;
    public $addons;
    public $facilities;
    public $tags;
    public Template $project;
    public $complex_data = array();
    public $image;

    public $listeners = [
        'dataChanged',
    ];

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
        $this->project = new Template;

        $this->departments = $this->readyProjectDepartmentRepository->getAllDepartments();
        $this->addons = $this->addonRepository->getAll();
        $this->facilities = $this->facilityRepository->getAll();
        $this->tags = $this->tagRepository->getAll();
    }

    // * to define rules for all post requests comming to this component
    public function rules(): array
    {
        return (new ReadyProjectStoreRequest)->rules();
    }

    // * to handle realtime validation on single properity at a time
    public function updated($property)
    {
        $this->validateOnly($property);
        $this->dispatchBrowserEvent('myevent');
    }

    public function submit()
    {
        $this->validate();

        if ($this->validateIds() || $this->validateDesc())
            return;

        DB::beginTransaction();
        try {

            $ready_project = $this->readyProjectRepository->store($this->project, $this->complex_data, $this->image);

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }
    }

    public function dataChanged($var_name, $data) {
        $this->complex_data[$var_name] = $data;
    }

    public function validateIds() {
        $err = false;
        if (isset($this->complex_data['addons_ids'])) {
            if (!$this->addonRepository->exists($this->complex_data['addons_ids'])) {
                $this->addError('addons_ids', __('validation.exists'));
                $err = true;
            }
        }

        if (isset($this->complex_data['facilities_ids'])) {
            if (!$this->facilityRepository->exists($this->complex_data['facilities_ids'])) {
                $this->addError('facilities_ids', __('validation.exists'));
                $err = true;
            }
        }

        if (isset($this->complex_data['tags_ids'])) {
            if (!$this->tagRepository->exists($this->complex_data['tags_ids'])) {
                $this->addError('tags_ids', __('validation.exists'));
                $err = true;
            }
        }

        return $err;
    }

    public function validateDesc() {
        $err = false;
        if (!isset($this->complex_data['desc_ar']) || $this->complex_data['desc_ar'] == '') {
            $this->addError('desc_ar', __('validation.required'));
            $err = true;
        }

        if (!isset($this->complex_data['desc_en']) || $this->complex_data['desc_en'] == '') {
            $this->addError('desc_en', __('validation.required'));
            $err = true;
        }

        return $err;
    }

    public function render()
    {
        $this->dispatchBrowserEvent('myevent');
        $this->dispatchBrowserEvent('my:loaded');
        return view('livewire.admin.ready-project-create');
    }
}
