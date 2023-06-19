<?php

namespace App\Interfaces;

use App\Models\TicketReply;

interface TicketReplyAttachmentRepositoryInterface {

    public function store(TicketReply $model, $file, $isLivewire = true);

    public function storeBulk(TicketReply $model, $files, $isLivewire = true);

}
