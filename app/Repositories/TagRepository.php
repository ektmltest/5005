<?php

namespace App\Repositories;
use App\Interfaces\TagRepositoryInterface;
use App\Models\Tag;

class TagRepository implements TagRepositoryInterface {
    public function getAll() {
        return Tag::get();
    }

    public function findById($id) {
        return Tag::find($id);
    }

    public function exists($ids) {
        return !Tag::whereIn('id', $ids)->get()->isEmpty();
    }
}
