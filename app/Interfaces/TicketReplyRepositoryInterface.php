<?php

namespace App\Interfaces;

interface TicketReplyRepositoryInterface {

    public function store($request, $ticket_id);

}
