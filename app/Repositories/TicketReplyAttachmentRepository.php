<?php

namespace App\Repositories;
use App\Helpers\File;
use App\Interfaces\TicketReplyAttachmentRepositoryInterface;
use App\Models\TicketReplyAttachment;
use Illuminate\Support\Facades\DB;

class TicketReplyAttachmentRepository implements TicketReplyAttachmentRepositoryInterface {
    use File;

    public function store(TicketReplyAttachment $model, $file, $isLivewire = true) {
        TicketReplyAttachment::create([
            'file' => $this->prepareFilePath($file, 'tickets/replies', $isLivewire),
            'ticket_id' => $model->id,
        ]);
    }

    public function storeBulk(TicketReplyAttachment $model, $files, $isLivewire = true) {
        $dataToInsert = [];
        foreach($files as $file) {
            $dataToInsert[] = [
                'file' => $this->prepareFilePath($file, 'tickets/replies', $isLivewire),
                'ticket_id' => $model->id,
            ];
        }

        DB::table('ticketx_attachments')
            ->insert($dataToInsert);
    }

}
