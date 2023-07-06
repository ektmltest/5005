<?php

namespace App\Repositories;
use App\Interfaces\AddonRepositoryInterface;
use App\Models\Addon;

class AddonRepository implements AddonRepositoryInterface {
    public function getAll() {
        return Addon::get();
    }

    public function findById($id) {
        return Addon::find($id);
    }

    public function exists($ids) {
        return (Addon::whereIn('id', $ids)->get()->count() == count($ids));
    }
}
