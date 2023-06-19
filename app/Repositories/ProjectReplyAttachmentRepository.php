<?php

namespace App\Repositories;
use App\Helpers\File;
use App\Interfaces\ProjectReplyAttachmentRepositoryInterface;
use App\Models\ProjectReply;
use App\Models\ProjectReplyAttachment;
use Illuminate\Support\Facades\DB;

class ProjectReplyAttachmentRepository implements ProjectReplyAttachmentRepositoryInterface {
    use File;

    public function store(ProjectReply $model, $file, $isLivewire = true) {
        ProjectReplyAttachment::create([
            'file' => $this->prepareFilePath($file, 'projects/replies', $isLivewire),
            'project_reply_id' => $model->id,
        ]);
    }

    public function storeBulk(ProjectReply $model, $files, $isLivewire = true) {
        $dataToInsert = [];
        foreach($files as $file) {
            $dataToInsert[] = [
                'file' => $this->prepareFilePath($file, 'projects/replies', $isLivewire),
                'project_reply_id' => $model->id,
            ];
        }

        DB::table('project_reply_attachments')
            ->insert($dataToInsert);
    }

}
