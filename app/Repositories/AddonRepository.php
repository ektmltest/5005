<?php

namespace App\Repositories;
use App\Interfaces\AddonRepositoryInterface;
use App\Models\Addon;

class AddonRepository implements AddonRepositoryInterface {
    public function getAll() {
        return Addon::get();
    }
}
