<?php

namespace App\Http\Livewire\Admin;

use App\Http\Requests\Admin\PlatformStoreRequest;
use App\Repositories\PlatformRepository;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Platforms extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $store = array();
    public $platform;
    protected $platforms;
    protected $listeners = ['resetAction'];

    private $platformRepository;

    public function __construct() {
        $this->platformRepository = new PlatformRepository;
    }

    public function deleteMode($id) {
        $this->dispatchBrowserEvent('deleteMode', ['id' => $id]);
    }

    public function rules() {
        return (new PlatformStoreRequest())->rules();
    }

    public function updated($prop) {
        $this->validateOnly($prop);
    }

    public function addPlatform() {
        $this->validate();

        DB::beginTransaction();
        try {

            $this->platform = $this->platformRepository->store($this->store);

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }
    }

    public function deletePlatform($id) {
        DB::beginTransaction();
        try {

            $this->platformRepository->delete($id);

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }
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
        return view('livewire.admin.platforms', [
            'platforms' => $this->platformRepository->getAll(paginate: true),
        ]);
    }
}
