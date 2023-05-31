<?php
namespace App\Http\Livewire\Website;

use App\Http\Requests\TicketStoreRequest;
use App\Models\Ticket as ModelsTicket;
use App\Repositories\TicketAttachmentRepository;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use App\Repositories\TicketRepository;
use App\Repositories\TicketTypeRepository;
use Illuminate\Support\Str;

class Ticket extends Component
{
    use WithFileUploads;

    public $ticketTypes;
    public $availableTickets;
    public $closedTickets;
    public ModelsTicket $ticket;
    public $files = array();
    public $noFiles = 1;
    // * end form data
    protected $ticketTypeRepository;
    protected $ticketRepository;
    protected $ticketAttachmentRepository;

    public function __construct()
    {
        $this->ticketTypeRepository = new TicketTypeRepository;
        $this->ticketRepository = new TicketRepository;
        $this->ticketAttachmentRepository = new TicketAttachmentRepository;
        $this->ticket = new ModelsTicket;

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

    public function submit()
    {
        $this->validate();

        $this->ticket->status = 'available';
        $this->ticket->save();

        foreach ($this->files as $file) {
            $this->ticketAttachmentRepository->store($this->ticket, $file);
        }

        $this->reset();
        session()->flash('message', 'Ticket Created Successfully.!');
    }


    public function showTickets()
    {
        return view('ticket-show');
    }

    public function addBtn()
    {
        $this->noFiles++;
    }

    public function render()
    {
        return view('livewire.website.ticket');
    }
}
