<?php

namespace App\Repositories;
use App\Interfaces\TicketRepositoryInterface;
use App\Models\Ticket;

class TicketRepository implements TicketRepositoryInterface {

    public function getAllTickets() {
        return Ticket::where('user_id', auth()->user()->id)->get();
    }

    public function getAllAvailableTickets() {
        return Ticket::where('user_id', auth()->user()->id)->where('status', 'available')->get();
    }

    public function getAllClosedTickets() {
        return Ticket::where('user_id', auth()->user()->id)->where('status', 'closed')->get();
    }
}


?>
