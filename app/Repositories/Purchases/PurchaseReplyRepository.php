<?php

namespace App\Repositories\Purchases;

use App\Models\PurchaseReply;

class PurchaseReplyRepository {

    protected $purchaseReplyAttachmentRepository;
    public function __construct() {
        $this->purchaseReplyAttachmentRepository = PurchaseReplyAttachmentRepository::instance();
    }

    public static function instance() {
        return new self;
    }

    public function store($request, $purchase_id, $files = null) {
        $reply = PurchaseReply::create([
            'message' => $request->message,
            'user_id' => auth()->user()->id,
            'purchase_id' => $purchase_id
        ]);

        if ($files)
            $this->purchaseReplyAttachmentRepository->storeBulk($reply, $files);
        else
            if (isset($request->file()['files']))
                $this->purchaseReplyAttachmentRepository->storeBulk($reply, $request->file()['files']);

        return $reply;
    }
}
