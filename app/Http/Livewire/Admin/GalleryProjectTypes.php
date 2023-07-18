<?php

namespace App\Http\Livewire\Admin;

use App\Http\Requests\GalleryTypeStoreRequest;
use App\Http\Requests\GalleryTypeUpdateRequest;
use App\Repositories\GallaryProjectTypeRepository;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class GalleryProjectTypes extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $data = array();
    public $store = array();
    public $gallery_type;

    protected $types;
    protected $listeners = ['resetAction'];
    protected $galleryTypeRepository;

    public function __construct() {
        $this->galleryTypeRepository = new GallaryProjectTypeRepository;

        $this->types = $this->galleryTypeRepository->getAllTypes();
        foreach($this->types as $type) {
            $this->data[$type->id]['name_ar'] = $type->nameLocale('ar');
            $this->data[$type->id]['name_en'] = $type->nameLocale('en');
            $this->data[$type->id]['key'] = $type->key;
        }
    }

    public function addGalleryType() {
        $this->validate((new GalleryTypeStoreRequest())->rules());
        DB::beginTransaction();
        try {

            $this->gallery_type = $this->galleryTypeRepository->store($this->store);

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }
    }

    public function editGalleryType($id) {
        $this->validate((new GalleryTypeUpdateRequest())->rules());
        DB::beginTransaction();
        try {

            $tmp = $this->galleryTypeRepository->findByKey($this->data[$id]['key']);
            if($tmp && $tmp->id != $id) {
                $this->addError("data.$id.key", __('validation.unique'));
                return;
            }

            $this->gallery_type = $tmp ?? $this->galleryTypeRepository->findById($id);
            $this->gallery_type->name = [
                'en' => $this->data[$id]['name_en'],
                'ar' => $this->data[$id]['name_ar']
            ];
            $this->gallery_type->key = $this->data[$id]['key'];

            $this->gallery_type->save();

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }
    }

    public function deleteGalleryType($id) {
        DB::beginTransaction();
        try {

            $this->galleryTypeRepository->delete($id);

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }
    }

    public function updateMode($id) {
        $this->dispatchBrowserEvent('updateMode', ['id' => $id]);
    }

    public function deleteMode($id) {
        $this->dispatchBrowserEvent('deleteMode', ['id' => $id]);
    }

    public function resetErrorMessages() {
        // $this->resetValidation();
        // $this->reset();
        $this->resetAction();
    }

    public function resetAction() {
        $this->reset();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.admin.gallery-project-types', [
            'types' => $this->galleryTypeRepository->getAllTypes(paginate: true)
        ]);
    }
}
