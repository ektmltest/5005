<?php

namespace App\Http\Livewire\Admin;

use App\Http\Requests\RankStoreRequest;
use App\Repositories\RankRepository;
use App\Repositories\RankTypeRepository;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RankEdit extends Component
{
    public $rank;
    public $types;
    public $data = array();

    protected $rankRepository;
    protected $rankTypeRepository;

    public function __construct() {
        $this->rankRepository = new RankRepository;
        $this->rankTypeRepository = new RankTypeRepository;

        $this->types = $this->rankTypeRepository->getAll();
    }

    public function mount($id) {
        $this->rank = $this->rankRepository->findById($id);

        $this->data['name_ar'] = $this->rank->nameLocale('ar');
        $this->data['name_en'] = $this->rank->nameLocale('en');
        $this->data['priority'] = $this->rank->priority;
        $this->data['type'] = $this->rank->type->id;
    }

    public function rules() {
        return (new RankStoreRequest)->rules();
    }

    public function updated($property) {
        $this->validateOnly($property);
    }

    public function submit() {
        $this->validate();

        DB::beginTransaction();
        try {

            $this->rankRepository->update($this->rank, $this->data);

            $this->rank = $this->rankRepository->findById($this->rank->id);

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }
    }

    public function render()
    {
        return view('livewire.admin.rank-edit');
    }
}
