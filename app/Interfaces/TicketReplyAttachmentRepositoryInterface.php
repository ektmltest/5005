<?php

namespace App\Interfaces;

use App\Models\TicketReplyAttachment;

interface TicketReplyAttachmentRepositoryInterface {

    public function store(TicketReplyAttachment $model, $file, $isLivewire = true);

    public function storeBulk(TicketReplyAttachment $model, $files, $isLivewire = true);
}
