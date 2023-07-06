<?php

namespace App\Http\Livewire\Admin;

use App\Http\Requests\Admin\ReadyProjectStoreRequest;
use App\Repositories\AddonRepository;
use App\Repositories\FacilityRepository;
use App\Repositories\ReadyProjectDepartmentRepository;
use App\Repositories\TagRepository;
use Livewire\Component;

class ReadyProjectCreate extends Component
{
    public $departments;
    public $addons;
    public $facilities;
    public $tags;
    public $name_ar, $name_en,
        $desc_ar, $desc_en,
        $short_desc_ar, $short_desc_en,
        $price,
        $tax,
        $dept_id,
        $ids = array(),
        $link,
        $image,
        $test;

    public $listeners = [
        'dataChanged',
    ];

    private $readyProjectDepartmentRepository;
    private $addonRepository;
    private $facilityRepository;
    private $tagRepository;

    public function __construct() {
        $this->readyProjectDepartmentRepository = (new ReadyProjectDepartmentRepository);
        $this->addonRepository = (new AddonRepository);
        $this->facilityRepository = (new FacilityRepository);
        $this->tagRepository = (new TagRepository);

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
        dd($this->all());
        $this->validate();

        if ($this->validateIds())
            return;

        dd($this->all());
    }

    public function test() {
        dd('test');
    }

    public function dataChanged($var_name, $data) {
        $this->ids[$var_name] = $data;
    }

    public function validateIds() {
        $err = false;
        if (isset($this->ids['addons_ids'])) {
            if (!$this->addonRepository->exists($this->ids['addons_ids'])) {
                $this->addError('addons_ids', 'There is an invalid addon id!');
                $err = true;
            }
        }

        if (isset($this->ids['facilities_ids'])) {
            if (!$this->addonRepository->exists($this->ids['facilities_ids'])) {
                $this->addError('facilities_ids', 'There is an invalid facility id!');
                $err = true;
            }
        }

        if (isset($this->ids['tags_ids'])) {
            if (!$this->addonRepository->exists($this->ids['tags_ids'])) {
                $this->addError('tags_ids', 'There is an invalid tag id!');
                $err = true;
            }
        }

        return $err;
    }

    public function render()
    {
        $this->dispatchBrowserEvent('myevent');
        return view('livewire.admin.ready-project-create');
    }
}
