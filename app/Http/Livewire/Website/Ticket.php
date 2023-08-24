<?php
namespace App\Http\Livewire\Website;

use App\Http\Requests\TicketStoreRequest;
use App\Models\Purchase;
use App\Models\Ticket as ModelsTicket;
use App\Repositories\Purchases\PurchaseRepository;
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
    public $purchases;
    public ModelsTicket $ticket;
    public $files = array();
    public $noFiles = 1;
    public $currentPage = 'create';
    // * end form data
    protected $ticketTypeRepository;
    protected $ticketRepository;
    protected $ticketAttachmentRepository;
    protected $purchaseRepository;

    public function __construct()
    {
        $this->ticketTypeRepository = new TicketTypeRepository;
        $this->ticketRepository = TicketRepository::instance();
        $this->ticketAttachmentRepository = new TicketAttachmentRepository;
        $this->ticket = new ModelsTicket;
        $this->purchaseRepository = PurchaseRepository::instance();

        $this->ticketTypes = $this->ticketTypeRepository->getAllTicketTypes();
        $this->availableTickets = $this->ticketRepository->getAllAvailableTickets();
        $this->closedTickets = $this->ticketRepository->getAllClosedTickets();
        $this->purchases = $this->purchaseRepository->getAll(auth: true);
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
        $this->ticket->user_id = auth()->user()->id;
        $this->ticket->save();

        foreach ($this->files as $file) {
            $this->ticketAttachmentRepository->store($this->ticket, $file);
        }

        $this->reset();
        $this->noFiles = 1;
        $this->files = array();
        $this->dispatchBrowserEvent('my:message.success', ['message' => __('messages.done')]);
    }


    // public function showTickets()
    // {
    //     return view('ticket-show', $this->);
    // }

    public function changePage($page) {
        $this->currentPage = $page;
    }

    public function addBtn()
    {
        $this->noFiles++;
    }

    public function render()
    {
        $this->dispatchBrowserEvent('my:loaded');
        return view('livewire.website.ticket');
    }
}
