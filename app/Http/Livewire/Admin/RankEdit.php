<?php

namespace App\Http\Livewire\Admin;

use App\Repositories\RankRepository;
use App\Repositories\RankTypeRepository;
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

    public function render()
    {
        return view('livewire.admin.rank-edit');
    }
}
