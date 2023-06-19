<?php

namespace App\Interfaces;

use App\Models\Ticket;

interface TicketAttachmentRepositoryInterface {
    public function store(Ticket $model, $file, $isLivewire = true);

    public function storeBulk(Ticket $model, $files, $isLivewire = true);
}
