<?php

namespace App\Http\Livewire\Admin;

use App\Repositories\TicketTypeRepository;
use Livewire\Component;

class TicketType extends Component
{
    protected $types;

    private $ticketTypeRepository;

    public function __construct() {
        $this->ticketTypeRepository = new TicketTypeRepository;
    }

    public function mount() {
        $this->types = $this->ticketTypeRepository->getAllTicketTypes(paginate: true);
    }

    public function render()
    {
        return view('livewire.admin.ticket-types', [
            'types' => $this->types,
        ]);
    }
}
