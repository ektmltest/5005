<?php

namespace App\Repositories;

use App\Interfaces\ProjectReplyRepositoryInterface;
use App\Interfaces\ProjectReplyAttachmentRepositoryInterface;
use App\Models\ProjectReply;

class ProjectReplyRepository implements ProjectReplyRepositoryInterface {
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
}
