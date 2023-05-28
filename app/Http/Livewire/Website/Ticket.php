<?php

namespace App\Http\Livewire\Website;

use App\Http\Requests\TicketStoreRequest;
use App\Repositories\TicketRepository;
use App\Repositories\TicketTypeRepository;
use Livewire\Component;

class Ticket extends Component
{
    public $ticketTypes;
    public $availableTickets;
    public $closedTickets;
    // * form data
    public $title;
    public $type;
    public $message;
    public $files = array();
    // * end form data
    protected $ticketTypeRepository;
    protected $ticketRepository;

    public function __construct()
    {
        $this->ticketTypeRepository = new TicketTypeRepository;
        $this->ticketRepository = new TicketRepository;

        $this->ticketTypes = $this->ticketTypeRepository->getAllTicketTypes();
        $this->availableTickets = $this->ticketRepository->getAllAvailableTickets();
        $this->closedTickets = $this->ticketRepository->getAllClosedTickets();
    }

    // * to define rules for all post requests comming to this component
    public function rules(): array
    {
        return (new TicketStoreRequest)->rules();
    }

    // * to handle realtime validation on single properity at a time
    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function submit() {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.website.ticket');
    }
}
