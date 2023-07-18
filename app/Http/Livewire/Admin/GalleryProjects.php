<?php

namespace App\Http\Livewire\Admin;

use App\Http\Requests\GalleryStoreRequest;
use App\Repositories\GallaryProjectRepository;
use App\Repositories\GallaryProjectTypeRepository;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class GalleryProjects extends Component
{
    use WithPagination, WithFileUploads;
    protected $paginationTheme = 'bootstrap';

    public $store = array();
    public $image;
    public $gallery;

    protected $listeners = ['resetAction'];
    protected $galleryRepository;
    protected $galleryTypeRepository;

    public function __construct() {
        $this->galleryRepository = new GallaryProjectRepository;
        $this->galleryTypeRepository = new GallaryProjectTypeRepository;
    }

    public function updated($prop) {
        $this->validateOnly($prop);
    }

    public function rules() {
        return (new GalleryStoreRequest())->rules();
    }

    public function addToGallery() {
        $this->validate();
        DB::beginTransaction();
        try {

            $this->gallery = $this->galleryRepository->store($this->store, $this->image);

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }
    }

    public function deleteFromGallery($id) {
        DB::beginTransaction();
        try {

            $this->galleryRepository->delete($id);

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }
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
        return view('livewire.admin.gallery-projects', [
            'projects' => $this->galleryRepository->getAllProjects(paginate: true),
            'types' => $this->galleryTypeRepository->getAllTypes()
        ]);
    }
}
