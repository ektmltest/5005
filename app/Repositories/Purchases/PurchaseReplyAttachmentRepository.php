<?php

namespace App\Repositories\Purchases;

use App\Helpers\File;
use App\Models\PurchaseReply;
use Illuminate\Support\Facades\DB;

class PurchaseReplyAttachmentRepository {
    use File;

    public static function instance() {
        return new self();
    }

    public function storeBulk(PurchaseReply $model, $files, $isLivewire = true) {
        $dataToInsert = [];
        foreach($files as $file) {
            $dataToInsert[] = [
                'file' => $this->prepareFilePath($file, 'purchases/replies', $isLivewire),
                'purchase_reply_id' => $model->id,
            ];
        }

        DB::table('purchase_reply_attachments')
            ->insert($dataToInsert);
    }
}
