<?php

namespace App\Repositories;

use App\Interfaces\ProjectAttachmentRepositoryInterface;
use App\Interfaces\ProjectRepositoryInterface;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectRepository implements ProjectRepositoryInterface {
    protected ProjectAttachmentRepositoryInterface $projectAttachmentRepository;

    public function __construct(ProjectAttachmentRepositoryInterface $projectAttachmentRepository) {
        $this->projectAttachmentRepository = $projectAttachmentRepository;
    }

    public function store(Project $project, $files) {
        $project->project_state_id = 1; // TODO: Must Be Updated
        $project->user_id = auth()->user()->id;
        $project->save();

        foreach ($files as $file) {
            $this->projectAttachmentRepository->store($project, $file);
        }

        return $project;
    }

    public function getProjectState() {

    }
}
