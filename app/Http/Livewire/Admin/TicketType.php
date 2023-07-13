<?php

namespace App\Http\Livewire\Admin;

use App\Http\Requests\TicketTypeStoreRequest;
use App\Http\Requests\TicketTypeUpdateRequest;
use App\Repositories\TicketTypeRepository;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class TicketType extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $data = array();
    public $store = array();
    public $ticket_type;
    protected $types;
    protected $listeners = ['resetAction'];

    private $ticketTypeRepository;

    public function __construct() {
        $this->ticketTypeRepository = new TicketTypeRepository;

        $this->types = $this->ticketTypeRepository->getAllTicketTypes();
        foreach($this->types as $type) {
            $this->data[$type->id]['name_ar'] = $type->nameLocale('ar');
            $this->data[$type->id]['name_en'] = $type->nameLocale('en');
        }
    }

    public function mount() {
        // $this->types = $this->ticketTypeRepository->getAllTicketTypes(paginate: true);
        // foreach($this->types as $type) {
        //     $this->data[$type->id]['name_ar'] = $type->nameLocale('ar');
        //     $this->data[$type->id]['name_en'] = $type->nameLocale('en');
        // }
    }

    public function updateMode($id) {
        $this->dispatchBrowserEvent('updateMode', ['id' => $id]);
    }

    public function deleteMode($id) {
        $this->dispatchBrowserEvent('deleteMode', ['id' => $id]);
    }

    public function addTicketType() {
        $this->validate((new TicketTypeStoreRequest())->rules());
        DB::beginTransaction();
        try {

            $this->ticket_type = $this->ticketTypeRepository->store($this->store);

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }
    }

    public function editTicketType($id) {
        $this->validate((new TicketTypeUpdateRequest())->rules());
        DB::beginTransaction();
        try {

            $this->ticket_type = $this->ticketTypeRepository->findById($id);
            $this->ticket_type->name = [
                'en' => $this->data[$id]['name_en'],
                'ar' => $this->data[$id]['name_ar']
            ];

            $this->ticket_type->save();

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }
    }

    public function deleteTicketType($id) {
        DB::beginTransaction();
        try {

            $this->ticketTypeRepository->delete($id);

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }
    }

    public function resetErrorMessages() {
        $this->resetValidation();
        // $this->types = $this->ticketTypeRepository->getAllTicketTypes();
        // foreach($this->types as $type) {
        //     $this->data[$type->id]['name_ar'] = $type->nameLocale('ar');
        //     $this->data[$type->id]['name_en'] = $type->nameLocale('en');
        // }
        $this->reset();
    }

    public function resetAction() {
        $this->reset();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.admin.ticket-types', [
            'types' => $this->ticketTypeRepository->getAllTicketTypes(paginate: true)
            // 'types' => $this->types
        ]);
    }
}
