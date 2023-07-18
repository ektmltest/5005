<?php

namespace App\Repositories;

use App\Models\Platform;

class PlatformRepository {

    public function getAll($paginate = false, $num = 10) {
        if ($paginate)
            return Platform::paginate($num);
        else
            return Platform::get();
    }

    public function delete($id) {
        return Platform::destroy($id);
    }

    public function store($data) {
        return Platform::create([
            'name' => [
                'en' => $data['name_en'],
                'ar' => $data['name_ar']
            ],
            'icon' => $data['icon'],
            'link' => $data['link'],
            'user_id' => auth()->user()->id,
        ]);
    }

}
