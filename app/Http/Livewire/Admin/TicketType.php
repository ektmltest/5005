<?php

namespace App\Http\Livewire\Admin;

use App\Repositories\TicketTypeRepository;
use Livewire\Component;

class TicketType extends Component
{
    public $data = array();
    protected $types;

    private $ticketTypeRepository;

    public function __construct() {
        $this->ticketTypeRepository = new TicketTypeRepository;
    }

    public function mount() {
        $this->types = $this->ticketTypeRepository->getAllTicketTypes(paginate: true);
    }

    public function updated($property) {
        $this->validateOnly($property);
    }

    public function addTicketType() {

    }

    public function editTicketType($id) {
        // $this->ticketTypeRepository->update()
    }

    public function deleteTicketType($id) {

    }

    public function render()
    {
        return view('livewire.admin.ticket-types', [
            'types' => $this->types,
        ]);
    }
}
