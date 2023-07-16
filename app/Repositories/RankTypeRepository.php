<?php

namespace App\Repositories;

use App\Interfaces\RankTypeRepositoryInterface;
use App\Models\RankType;

class RankTypeRepository implements RankTypeRepositoryInterface {

    public function getAll() {
        return RankType::all();
    }

}
