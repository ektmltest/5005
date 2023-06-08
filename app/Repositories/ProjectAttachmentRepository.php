<?php

namespace App\Repositories;
use App\Helpers\File;
use App\Interfaces\ProjectAttachmentRepositoryInterface;
use App\Models\Project;
use App\Models\ProjectAttachment;
use Illuminate\Support\Facades\DB;

class ProjectAttachmentRepository implements ProjectAttachmentRepositoryInterface {
    use File;

    public function store(Project $project, $file, $isLivewire = true) {
        return ProjectAttachment::create([
            'file' => $this->prepareFilePath($file, 'projects', $isLivewire),
            'project_id' => $project->id,
        ]);
    }

    public function storeBulk(Project $project, $files, $isLivewire = true) {
        $dataToInsert = [];
        foreach($files as $file) {
            $dataToInsert[] = [
                'file' => $this->prepareFilePath($file, 'projects', $isLivewire),
                'project_id' => $project->id,
            ];
        }

        DB::table('project_attachments')
            ->insert($dataToInsert);
    }

    public function deleteAllRelatedFiles(Project $project) {
        foreach ($project->attachments as $attachment) {
            $this->deleteUsingFilePath($attachment->file);
        }
    }

    public function deleteAllFiles() {
        $attachments = ProjectAttachment::all();

        foreach ($attachments as $attachment) {
            $this->deleteUsingFilePath($attachment->file);
        }

        ProjectAttachment::truncate();
    }
}
