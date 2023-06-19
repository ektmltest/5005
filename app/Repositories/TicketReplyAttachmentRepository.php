<?php

namespace App\Repositories;
use App\Helpers\File;
use App\Interfaces\TicketReplyAttachmentRepositoryInterface;
use App\Models\TicketReply;
use App\Models\TicketReplyAttachment;
use Illuminate\Support\Facades\DB;

class TicketReplyAttachmentRepository implements TicketReplyAttachmentRepositoryInterface {
    use File;

    public function store(TicketReply $model, $file, $isLivewire = true) {
        TicketReplyAttachment::create([
            'file' => $this->prepareFilePath($file, 'tickets/replies', $isLivewire),
            'ticket_reply_id' => $model->id,
        ]);
    }

    public function storeBulk(TicketReply $model, $files, $isLivewire = true) {
        $dataToInsert = [];
        foreach($files as $file) {
            $dataToInsert[] = [
                'file' => $this->prepareFilePath($file, 'tickets/replies', $isLivewire),
                'ticket_reply_id' => $model->id,
            ];
        }

        DB::table('ticket_reply_attachments')
            ->insert($dataToInsert);
    }

}
