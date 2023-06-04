<?php

namespace App\Interfaces;

use App\Models\Project;

interface ProjectAttachmentRepositoryInterface {
    public function store(Project $model, $file, $isLivewire = true);
}
