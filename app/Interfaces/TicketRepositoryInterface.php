<?php
namespace App\Interfaces;

interface TicketRepositoryInterface {

    public function getAllTickets();

    public function getAllAvailableTickets();

    public function getAllClosedTickets();
    
}
