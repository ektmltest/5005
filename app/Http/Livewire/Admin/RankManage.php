<?php

namespace App\Http\Livewire\Admin;

use App\Http\Requests\RankStoreRequest;
use App\Repositories\RankRepository;
use App\Repositories\RankTypeRepository;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RankManage extends Component
{
    public $filter = null;
    public $data = array();

    protected $rankRepository;
    protected $rankTypeRepository;

    public function __construct() {
        $this->rankRepository = new RankRepository;
        $this->rankTypeRepository = new RankTypeRepository;
    }

    public function filterAction() {
        $this->filter = $this->filter == 'none' ? null : $this->filter;
        $this->render();
    }

    public function rules() {
        return (new RankStoreRequest())->rules();
    }

    public function updated($property) {
        $this->validateOnly($property);
    }

    public function addRank() {
        $this->validate();

        DB::beginTransaction();
        try {

            $rank = $this->rankRepository->store($this->data);

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }
    }

    public function deleteRank($id) {
        DB::beginTransaction();
        try {

            $this->rankRepository->delete($id);

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }
    }

    public function render()
    {
        return view('livewire.admin.rank-manage', [
            'ranks' => $this->rankRepository->getAll(type: $this->filter),
            'types' => $this->rankTypeRepository->getAll(),
        ]);
    }
}
