<?php

namespace App\Repositories;

use App\Interfaces\ProjectAttachmentRepositoryInterface;
use App\Interfaces\ProjectRepositoryInterface;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectRepository implements ProjectRepositoryInterface {
    protected ProjectAttachmentRepositoryInterface $projectAttachmentRepository;

    public function __construct(ProjectAttachmentRepositoryInterface $projectAttachmentRepository) {
        $this->projectAttachmentRepository = $projectAttachmentRepository;
    }

    public function getProjectById($id) {
        return Project::find($id);
    }

    public function getAllProjects($auth = false) {
        if ($auth)
            return Project::where('user_id', auth()->user()->id)->orderBy('created_at')->get();
        return Project::orderBy('created_at')->get();
    }

    public function store(Project $project, $files, $categories) {
        $project->project_state_id = 1; // TODO: Must Be Updated
        $project->user_id = auth()->user()->id;
        $project->save();

        foreach ($files as $file) {
            $this->projectAttachmentRepository->store($project, $file);
        }

        $dataToInsert = [];
        foreach ($categories as $category) {
            $dataToInsert[] = [
                'project_id' => $project->id,
                'project_category_id' => $category->id,
            ];
        }

        DB::table('project_pivot_categories')
            ->insert($dataToInsert);

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
