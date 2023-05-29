<?php

namespace App\Repositories;
use App\Interfaces\TicketRepositoryInterface;
use App\Models\Ticket;

class TicketRepository implements TicketRepositoryInterface {
    public function getAllAvailableTickets() {
        return Ticket::where('status', 'available')->get();
    }

    public function getAllClosedTickets() {
        return Ticket::where('status', 'closed')->get();
    }
}


?>
