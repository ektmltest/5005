<?php

namespace App\Interfaces;

interface ProjectReplyRepositoryInterface {

    public function store($request, $project_id);

    public function deleteProjectReplies($project);

    public function delete($reply);

    public function deleteAllRelatedFiles($reply);

}
