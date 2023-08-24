<?php

namespace App\Repositories;

use App\Interfaces\TicketReplyAttachmentRepositoryInterface;
use App\Interfaces\TicketReplyRepositoryInterface;
use App\Models\TicketReply;

class TicketReplyRepository implements TicketReplyRepositoryInterface {
    protected $ticketReplyAttachmentRepository;

    public static function instance() {
        return new self(new TicketReplyAttachmentRepository);
    }

    public function __construct(TicketReplyAttachmentRepositoryInterface $ticketReplyAttachmentRepository) {
        $this->ticketReplyAttachmentRepository = $ticketReplyAttachmentRepository;
    }

    public function store($request, $ticket_id, $files = null) {
        $reply = TicketReply::create([
            'message' => $request->message,
            'user_id' => auth()->user()->id,
            'ticket_id' => $ticket_id
        ]);

        if ($files)
            $this->ticketReplyAttachmentRepository->storeBulk($reply, $files);
        else
            if (isset($request->file()['files']))
                $this->ticketReplyAttachmentRepository->storeBulk($reply, $request->file()['files']);

        return $reply;
    }
}
