<?php
namespace App\Interfaces;

use App\Models\Ticket;

interface TicketRepositoryInterface {

    public function getAllTickets();

    public function getAllAvailableTickets();

    public function getAllClosedTickets();

    public function getTicketById($id, $auth = false);

    public function store(Ticket $ticket, $files);

    public function prepareTicket($data): Ticket;

    public function closeAvailableTicket($ticket);

}
