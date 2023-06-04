<?php

namespace App\Repositories;
use App\Helpers\File;
use App\Interfaces\ProjectAttachmentRepositoryInterface;
use App\Models\Project;
use App\Models\ProjectAttachment;

class ProjectAttachmentRepository implements ProjectAttachmentRepositoryInterface {
    use File;

    public function store(Project $model, $file, $isLivewire = true) {
        return ProjectAttachment::create([
            'file' => $this->prepareFilePath($file, 'projects', $isLivewire),
            'project_id' => $model->id,
        ]);
    }
}
