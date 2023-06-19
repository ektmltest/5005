<?php

namespace App\Repositories;

use App\Interfaces\TicketAttachmentRepositoryInterface;
use App\Interfaces\TicketRepositoryInterface;
use App\Models\Ticket;

class TicketRepository implements TicketRepositoryInterface {

    protected $ticketAttachmentRepository;

    public function __construct(TicketAttachmentRepositoryInterface $ticketAttachmentRepository) {
        $this->ticketAttachmentRepository = $ticketAttachmentRepository;
    }

    public function getAllTickets() {
        return Ticket::where('user_id', auth()->user()->id)->get();
    }

    public function getAllAvailableTickets() {
        return Ticket::where('user_id', auth()->user()->id)->where('status', 'available')->get();
    }

    public function getAllClosedTickets() {
        return Ticket::where('user_id', auth()->user()->id)->where('status', 'closed')->get();
    }

    public function getTicketById($id, $auth = false) {
        $ticket = Ticket::find($id);
        if ($auth)
            if ($ticket && $ticket->user_id == auth()->user()->id)
                return $ticket;
            else
                return null;
        else
            return $ticket;
    }

    public function store(Ticket $ticket, $files) {
        $this->ticketAttachmentRepository->storeBulk($ticket, $files);

        return $ticket;
    }

    public function prepareTicket($data): Ticket {
        $ticket = new Ticket;
        $ticket->title = $data['title'];
        $ticket->description = $data['description'];
        $ticket->ticket_type_id = $data['ticket_type_id'];
        $ticket->user_id = auth()->user()->id;

        return $ticket;
    }

    public function closeAvailableTicket($ticket) {
        $ticket->status = 'closed';
        $ticket->save();

        return $ticket;
    }
}


?>
