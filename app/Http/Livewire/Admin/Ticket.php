<?php

namespace App\Http\Livewire\Admin;

use App\Repositories\Purchases\PurchaseRepository;
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
    private $purchaseRepository;

    public function __construct() {
        $this->ticketRepository = TicketRepository::instance();
        $this->purchaseRepository = PurchaseRepository::instance();
    }

    public function changeStatus(string $status) {
        $this->current_status = $status;
        $this->resetPage();
    }

    private function initVariables() {
        if ($this->current_status == 'available')
            $this->tickets = $this->ticketRepository->getAllAvailableTickets(auth: false, paginate: true);
        elseif ($this->current_status == 'closed')
            $this->tickets = $this->ticketRepository->getAllClosedTickets(auth: false, paginate: true);
        else
            $this->tickets = $this->purchaseRepository->getAll(paginate: true);
    }

    public function render()
    {
        $this->initVariables();
        $this->dispatchBrowserEvent('my:loaded');
        return view('livewire.admin.tickets', [
            'tickets' => $this->tickets
        ]);
    }
}
