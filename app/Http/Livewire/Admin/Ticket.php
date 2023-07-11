<?php

namespace App\Http\Livewire\Admin;

use App\Repositories\TicketAttachmentRepository;
use App\Repositories\TicketRepository;
use Livewire\Component;

class Ticket extends Component
{
    public $current_status = 'available';
    protected $tickets;

    private $ticketRepository;
    private $ticketAttachmentRepository;

    public function __construct() {
        $this->ticketAttachmentRepository = new TicketAttachmentRepository;
        $this->ticketRepository = new TicketRepository($this->ticketAttachmentRepository);
    }

    public function mount() {
        $this->tickets = $this->ticketRepository->getAllAvailableTickets(auth: false, paginate: true);
    }

    public function changeStatus(string $status) {
        $this->current_status = $status;
        $this->tickets = ($status == 'available') ? $this->ticketRepository->getAllAvailableTickets(auth: false, paginate: true) : $this->ticketRepository->getAllClosedTickets(auth: false, paginate: true);
    }

    public function render()
    {
        return view('livewire.admin.tickets', [
            'tickets' => $this->tickets
        ]);
    }
}
