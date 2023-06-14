<?php

namespace App\Repositories;

use App\Interfaces\ProjectAttachmentRepositoryInterface;
use App\Interfaces\ProjectCategoryRepositoryInterface;
use App\Interfaces\ProjectRepositoryInterface;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectRepository implements ProjectRepositoryInterface {
    protected ProjectAttachmentRepositoryInterface $projectAttachmentRepository;
    protected ProjectCategoryRepositoryInterface $projectCategoryRepository;

    public function __construct(ProjectAttachmentRepositoryInterface $projectAttachmentRepository, ProjectCategoryRepositoryInterface $projectCategoryRepository) {
        $this->projectAttachmentRepository = $projectAttachmentRepository;
        $this->projectCategoryRepository = $projectCategoryRepository;
    }

    public function getProjectById($id, $auth = false) {
        $project = Project::find($id);
        if ($auth) {
            if ($project->user->id == auth()->user()->id)
                return $project;
            else
                return null;
        }
        else
            return $project;
    }

    public function getAllProjects($auth = false) {
        if ($auth)
            return Project::where('user_id', auth()->user()->id)->orderBy('created_at')->get();
        return Project::orderBy('created_at')->get();
    }

    public function prepareProject($data): Project {
        $project = new Project;
        $project->name = $data['name'];
        $project->description = $data['description'];

        return $project;
    }

    public function store(Project $project, $files, $categories) {
        $project->project_state_id = 1; // TODO: Must Be Updated
        $project->user_id = auth()->user()->id;
        $project->save();

        foreach ($files as $file) {
            $this->projectAttachmentRepository->store($project, $file);
        }

        $this->projectCategoryRepository->storeToPivotBulk($categories, $project);

        return $project;
    }

    public function delete(Project $project) {
        $this->projectAttachmentRepository->deleteAllRelatedFiles($project);

        $project->delete();

        return true;
    }

    public function getProjectState() {

    }
}
