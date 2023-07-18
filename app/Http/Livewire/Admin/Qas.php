<?php

namespace App\Http\Livewire\Admin;

use App\Http\Requests\Admin\QasStoreRequest;
use App\Repositories\QasRepository;
use App\Repositories\QasTypeRepository;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Qas extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $store = array();
    public $qa;
    protected $qas;
    protected $listeners = ['resetAction'];

    private $qasRepository;
    private $qasTypeRepository;

    public function __construct() {
        $this->qasRepository = new QasRepository;
        $this->qasTypeRepository = new QasTypeRepository;
    }

    public function mount() {
        // $this->types = $this->ticketTypeRepository->getAllTicketTypes(paginate: true);
        // foreach($this->types as $type) {
        //     $this->data[$type->id]['name_ar'] = $type->nameLocale('ar');
        //     $this->data[$type->id]['name_en'] = $type->nameLocale('en');
        // }
    }

    public function deleteMode($id) {
        $this->dispatchBrowserEvent('deleteMode', ['id' => $id]);
    }

    public function rules() {
        return (new QasStoreRequest())->rules();
    }

    public function updated($prop) {
        $this->validateOnly($prop);
    }

    public function addQa() {
        $this->validate();

        DB::beginTransaction();
        try {

            $this->qa = $this->qasRepository->store($this->store);

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }
    }

    public function deleteQa($id) {
        DB::beginTransaction();
        try {

            $this->qasRepository->delete($id);

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
        return view('livewire.admin.qas', [
            'qas' => $this->qasRepository->getAll(paginate: true),
            'types' => $this->qasTypeRepository->getAll(),
        ]);
    }
}
