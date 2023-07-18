<?php

namespace App\Repositories;

use App\Interfaces\QasTypeRepositoryInterface;
use App\Models\QasType;

class QasTypeRepository implements QasTypeRepositoryInterface {

    public function findById($id) {
        return QasType::find($id);
    }

    public function getAll($paginate = false, $num = 10, $with = null) {
        if ($paginate)
            if ($with)
                return QasType::with($with)->paginate($num);
            else
                return QasType::paginate($num);
        else
            if ($with)
                return QasType::with($with)->get();
            else
                return QasType::get();
    }

    public function delete($id) {
        return QasType::destroy($id);
    }

    public function store($data) {
        return QasType::create([
            'name' => [
                'en' => $data['name_en'],
                'ar' => $data['name_ar']
            ],
            'icon' => $data['icon'],
            'unicode' => $data['unicode'],
            'user_id' => auth()->user()->id,
        ]);
    }

}
