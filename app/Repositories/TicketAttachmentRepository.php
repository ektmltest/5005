<?php

namespace App\Repositories;
use App\Helpers\File;
use App\Interfaces\TicketAttachmentRepositoryInterface;
use App\Models\Ticket;
use App\Models\TicketAttachment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TicketAttachmentRepository implements TicketAttachmentRepositoryInterface {
    use File;

    public function store(Ticket $model, $file, $isLivewire = true) {
        TicketAttachment::create([
            'file' => $this->prepareFilePath($file, 'tickets', $isLivewire),
            'ticket_id' => $model->id,
        ]);
    }

    public function storeBulk(Ticket $model, $files, $isLivewire = true) {
        $dataToInsert = [];
        foreach($files as $file) {
            $dataToInsert[] = [
                'file' => $this->prepareFilePath($file, 'tickets', $isLivewire),
                'ticket_id' => $model->id,
            ];
        }

        DB::table('ticket_attachments')
            ->insert($dataToInsert);
    }
}
