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

    public function getAllTickets($auth = true, $paginate = false, $num = 10) {
        if ($auth) {
            $res = Ticket::where('user_id', auth()->user()->id)->orderBy('created_at');
            if ($paginate) {
                return $res->paginate($num);
            } else {
                return $res->get();
            }
        }

        if ($paginate)
            return Ticket::orderBy('created_at')->paginate($num);
        else
            return Ticket::orderBy('created_at')->get();
    }

    public function getAllAvailableTickets($paginate = false, $auth = true, $num = 10) {
        if ($auth)
            if ($paginate)
                return Ticket::where('user_id', auth()->user()->id)->where('status', 'available')->orderBy('created_at')->paginate($num);
            else
                return Ticket::where('user_id', auth()->user()->id)->where('status', 'available')->orderBy('created_at')->get();
        else
            if ($paginate)
                return Ticket::where('status', 'available')->orderBy('created_at')->paginate($num);
            else
                return Ticket::where('status', 'available')->orderBy('created_at')->get();
    }

    public function getAllClosedTickets($paginate = false, $auth = true, $num = 10) {
        if ($auth)
            if ($paginate)
                return Ticket::where('user_id', auth()->user()->id)->where('status', 'closed')->orderBy('created_at')->paginate($num);
            else
                return Ticket::where('user_id', auth()->user()->id)->where('status', 'closed')->orderBy('created_at')->get();
        else
            if ($paginate)
                return Ticket::where('status', 'closed')->orderBy('created_at')->paginate($num);
            else
                return Ticket::where('status', 'closed')->orderBy('created_at')->get();
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
