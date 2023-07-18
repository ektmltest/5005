<?php

namespace App\Repositories;

use App\Models\QasType;

class QasTypeRepository {

    public function findById($id) {
        return QasType::find($id);
    }

    public function getAll($paginate = false, $num = 10) {
        if ($paginate)
            return QasType::paginate($num);
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
