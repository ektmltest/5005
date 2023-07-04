<?php

namespace App\Repositories;

use App\Helpers\File;
use App\Interfaces\ProjectReplyRepositoryInterface;
use App\Interfaces\ProjectReplyAttachmentRepositoryInterface;
use App\Models\ProjectReply;
use Illuminate\Support\Facades\DB;

class ProjectReplyRepository implements ProjectReplyRepositoryInterface {
    use File;

    protected $projectReplyAttachmentRepository;

    public function __construct(ProjectReplyAttachmentRepositoryInterface $projectReplyAttachmentRepository) {
        $this->projectReplyAttachmentRepository = $projectReplyAttachmentRepository;
    }

    public function store($request, $project_id) {
        $reply = ProjectReply::create([
            'message' => $request->message,
            'user_id' => auth()->user()->id,
            'project_id' => $project_id
        ]);

        if (isset($request->file()['files']))
            $this->projectReplyAttachmentRepository->storeBulk($reply, $request->file()['files']);

        return $reply;
    }

    public function deleteProjectReplies($project) {
        $dataToDelete = [];
        foreach ($project->replies as $reply) {
            // $this->deleteAllRelatedFiles($reply);
            $dataToDelete[] = $reply->id;
        }

        DB::table('project_replies')
            ->whereIn('id', $dataToDelete)
            ->delete();
    }

    public function delete($reply) {
        $this->deleteAllRelatedFiles($reply);

        $reply->delete();
    }

    public function deleteAllRelatedFiles($reply) {
        foreach ($reply->attachments as $attachment) {
            $this->deleteUsingFilePath($attachment->file);
        }
    }
}
