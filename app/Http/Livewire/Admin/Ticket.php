<?php

namespace App\Http\Livewire\Admin;

use App\Repositories\TicketAttachmentRepository;
use App\Repositories\TicketRepository;
use Livewire\Component;
use Livewire\WithPagination;

class Ticket extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $current_status = 'available';
    protected $tickets;

    private $ticketRepository;
    private $ticketAttachmentRepository;

    public function __construct() {
        $this->ticketAttachmentRepository = new TicketAttachmentRepository;
        $this->ticketRepository = new TicketRepository($this->ticketAttachmentRepository);
    }

    public function changeStatus(string $status) {
        $this->current_status = $status;
        $this->resetPage();
    }

    public function render()
    {
        $this->tickets = ($this->current_status == 'available') ? $this->ticketRepository->getAllAvailableTickets(auth: false, paginate: true) : $this->ticketRepository->getAllClosedTickets(auth: false, paginate: true);
        $this->dispatchBrowserEvent('my:loaded');
        return view('livewire.admin.tickets', [
            'tickets' => $this->tickets
        ]);
    }
}
