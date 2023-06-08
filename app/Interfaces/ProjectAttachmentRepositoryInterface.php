<?php

namespace App\Interfaces;

use App\Models\Project;

interface ProjectAttachmentRepositoryInterface {
    public function store(Project $model, $file, $isLivewire = true);
    public function storeBulk(Project $model, $files, $isLivewire = true);
    public function deleteAllRelatedFiles(Project $project);
    public function deleteAllFiles();
}
