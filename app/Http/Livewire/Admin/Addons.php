<?php

namespace App\Http\Livewire\Admin;

use App\Http\Requests\AddonStoreRequest;
use App\Repositories\AddonRepository;
use App\Repositories\AddonTypeRepository;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Addons extends Component
{
    public $data = array();

    private $addonRepository;
    private $addonTypeRespository;

    public function __construct() {
        $this->addonRepository = new AddonRepository;
        $this->addonTypeRespository = new AddonTypeRepository;
    }

    public function rules() {
        return (new AddonStoreRequest())->rules();
    }

    public function updated($property) {
        $this->validateOnly($property);
    }

    public function addAddon() {
        $this->validate();

        DB::beginTransaction();
        try {

            $addon = $this->addonRepository->store($this->data);

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }
    }

    public function deleteAddon($id) {
        DB::beginTransaction();
        try {

            $this->addonRepository->delete($id);

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }
    }

    public function render()
    {
        return view('livewire.admin.addons', [
            'addons' => $this->addonRepository->getAll(paginate: true),
            'types' => $this->addonTypeRespository->getAll(),
        ]);
    }
}
