<?php

namespace App\Http\Livewire\Admin;

use App\Helpers\File;
use App\Http\Requests\Admin\ReadyProjectUpdateRequest;
use App\Models\ReadyProject;
use App\Repositories\AddonRepository;
use App\Repositories\FacilityRepository;
use App\Repositories\ReadyProjectDepartmentRepository;
use App\Repositories\ReadyProjectRepository;
use App\Repositories\TagRepository;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class ReadyProjectEdit extends Component
{
    use WithFileUploads, File;

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
    public $image;
    public $dept_id;
    public $complex_data = array();

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

        $this->departments = $this->readyProjectDepartmentRepository->getAllDepartments();
        $this->addons = $this->addonRepository->getAll();
        $this->facilities = $this->facilityRepository->getAll();
        $this->tags = $this->tagRepository->getAll();
    }

    public function mount($id) {
        $this->project = $this->readyProjectRepository->findById($id);
        $this->name_ar = $this->project->nameLocale('ar');
        $this->name_en = $this->project->nameLocale('en');
        $this->price = $this->project->price;
        $this->tax = $this->project->marketing_discount_ratio;
        $this->link = $this->project->link;
        $this->short_desc_ar = $this->project->descriptionLocale('ar');
        $this->short_desc_en = $this->project->descriptionLocale('en');
        $this->desc_ar = $this->project->bodyLocale('ar');
        $this->desc_en = $this->project->bodyLocale('en');
        $this->dept_id = $this->project->ready_project_department_id;
        $this->complex_data['addons_ids'] = $this->project->addons()->pluck('addon_id')->toArray();
        $this->complex_data['tags_ids'] = $this->project->tags()->pluck('tag_id')->toArray();
        $this->complex_data['facilities_ids'] = $this->project->facilities()->pluck('facility_id')->toArray();
    }

    public function rules() {
        return (new ReadyProjectUpdateRequest())->rules();
    }

    public function updated($property) {
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

            if ($this->updateReadyProject())
                session()->flash('error', __('messages.error'));
            else
                session()->flash('message', __('messages.done'));

            DB::commit();

            // session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }
    }

    public function dataChanged($var_name, $data) {
        $this->complex_data[$var_name] = $data;
    }

    public function updateReadyProject() {
        $dataToUpdate = [
            'name' => [
                'en' => $this->name_en,
                'ar' => $this->name_ar
            ],
            'body' => [
                'en' => $this->complex_data['desc_en'],
                'ar' => $this->complex_data['desc_ar']
            ],
            'description' => [
                'en' => $this->short_desc_en,
                'ar' => $this->short_desc_ar
            ],
            'price' => $this->price,
            'marketing_discount_ratio' => $this->tax,
            'ready_project_department_id' => $this->dept_id,
            'link' => $this->link,
        ];
        if ($this->image) {
            if ($this->deleteProjectImage())
                return 1;
                // throw new \Exception('updating failed - project image file is not exists to be deleted');
            $dataToUpdate['image'] = $this->prepareFilePath($this->image, 'admin/store/projects', true);
        }

        $this->project = $this->readyProjectRepository->update($dataToUpdate, $this->complex_data, $this->project);
        return 0;
    }

    public function deleteProjectImage() {
        $file = public_path($this->project->image_uri);
        if (file_exists($file)) {
            unlink($file);
            return 0;
        }
        return 1;
    }

    public function validateIds() {
        $err = false;
        if (isset($this->complex_data['addons_ids']) && !empty($this->complex_data['addons_ids'])) {
            if (!$this->addonRepository->exists($this->complex_data['addons_ids'])) {
                $this->addError('addons_ids', __('validation.exists'));
                $err = true;
            }
        }

        if (isset($this->complex_data['facilities_ids']) && !empty($this->complex_data['facilities_ids'])) {
            if (!$this->facilityRepository->exists($this->complex_data['facilities_ids'])) {
                $this->addError('facilities_ids', __('validation.exists'));
                $err = true;
            }
        }

        if (isset($this->complex_data['tags_ids']) && !empty($this->complex_data['tags_ids'])) {
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
        return view('livewire.admin.ready-project-edit');
    }
}
