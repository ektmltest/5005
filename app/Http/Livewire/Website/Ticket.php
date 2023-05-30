<?php
namespace App\Http\Livewire\Website;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use App\Repositories\TicketRepository;
use App\Repositories\TicketTypeRepository;
use Illuminate\Support\Str;

class Ticket extends Component
{
    use WithFileUploads;

    public $id, $ticketTypes, $availableTickets, $closedTickets, $title, $ticket_type_id, $type, $description, $file;
    // * end form data
    protected $ticketTypeRepository, $ticketRepository;

    public function __construct()
    {
        $this->ticketTypeRepository = new TicketTypeRepository;
        $this->ticketRepository = new TicketRepository;

        $this->ticketTypes = $this->ticketTypeRepository->getAllTicketTypes();
        $this->availableTickets = $this->ticketRepository->getAllAvailableTickets();
        $this->closedTickets = $this->ticketRepository->getAllClosedTickets();
    }

    // * to define rules for all post requests comming to this component
    // public function rules(): array
    // {
    //     return (new TicketStoreRequest)->rules();
    // }

    public function render()
    {
        return view('livewire.website.ticket');
    }

    protected $rules = [
        'title' => 'required|string|min:3',
        'description' => 'required|min:10',
        'type' => 'required',
        'file' => 'required'
    ];

    // * to handle realtime validation on single properity at a time
    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function submit(Request $request)
    {
        $this->validate();
        $ticket = \App\Models\Ticket::create([
            'title' => $this->title,
            'description' => $this->description,
            'status' => 'available',
            'ticket_type_id' => $this->type,
        ]);
        $lastInsertedId= $ticket->id;

        $random = Str::random(6);
        \App\Models\TicketAttachment::create([
            'file' => ('assets/tickets/'.$this->file->storeAs('attachment', $random, 'file')),
            'ticket_id' => $lastInsertedId,
        ]);

        $this->reset();
        session()->flash('message', 'Ticket Created Successfully.!');
    }


    public function showTickets()
    {
        return view('ticket-show');
    }
}
