<?php

namespace App\Repositories;
use App\Interfaces\TicketAttachmentRepositoryInterface;
use App\Models\Ticket;
use App\Models\TicketAttachment;
use Illuminate\Support\Str;

class TicketAttachmentRepository implements TicketAttachmentRepositoryInterface {
    public function store(Ticket $model, $file, $isLivewire = true) {
        TicketAttachment::create([
            'file' => $this->prepareFilePath($file, $isLivewire),
            'ticket_id' => $model->id,
        ]);
    }

    protected function prepareFilePath($file, $isLivewire) {
        $random = Str::random(16);

        if ($isLivewire)
            return ('assets/tickets/'.$file->storeAs('attachment', $random . '.' . $file->getClientOriginalExtension(), 'file'));
        else {
            // TODO: here to upload when using api
            ;
        }
    }
}
