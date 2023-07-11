<?php


namespace App\Repositories;

use App\Interfaces\AddonTypeRepositoryInterface;
use App\Models\AddonType;

class AddonTypeRepository implements AddonTypeRepositoryInterface {
    public function getAll($paginate = false, $num = 10) {
        if ($paginate)
            return AddonType::paginate($num);
        else
            return AddonType::orderBy('created_at')->get();
    }
}
