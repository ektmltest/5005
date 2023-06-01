<?php

namespace App\Repositories;

use App\Interfaces\ReadyProjectRepositoryInterface;
use App\Models\ReadyProject;

class ReadyProjectRepository implements ReadyProjectRepositoryInterface {
    public function fill(array $ready_project) {
        return ((new ReadyProject)->fill($ready_project));
    }

    public function fillGet(array $ready_project) {
        return $this->findById($ready_project['id']);
    }

    public function getAllReadyProjects() {
        return ReadyProject::orderBy('created_at')->get();
    }

    public function findById($id) {
        return ReadyProject::find($id);
    }

    public function toggleLike($ready_project) {
        if (!$ready_project->liked()){
            $this->storeLike($ready_project);
            return true;
        } else {
            $ready_project->likes()->delete();
            return false;
        }
    }

    private function storeLike(ReadyProject $ready_project) {
        return $ready_project->likes()->create([
            'user_id' => auth()->user()->id,
            'likesable_type' => ReadyProject::class,
            'likesable_id' => $ready_project->id,
        ]);
    }
}
