<?php

namespace App\Interfaces;

use App\Models\ProjectReply;

interface ProjectReplyAttachmentRepositoryInterface {

    public function store(ProjectReply $model, $file, $isLivewire = true);

    public function storeBulk(ProjectReply $model, $files, $isLivewire = true);

}
