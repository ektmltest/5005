<?php

namespace App\Repositories;
use App\Interfaces\AddonRepositoryInterface;
use App\Models\Addon;

class AddonRepository implements AddonRepositoryInterface {
    public function getAll($paginate = false, $num = 10) {
        if ($paginate)
            return Addon::paginate($num);
        else
            return Addon::orderBy('created_at')->get();
    }

    public function findById($id) {
        return Addon::find($id);
    }

    public function exists($ids) {
        return (Addon::whereIn('id', $ids)->get()->count() == count($ids));
    }

    public function store($data) {
        return Addon::create([
            'name' => [
                'en' => $data['name_en'],
                'ar' => $data['name_ar']
            ],
            'price' => $data['price'],
            'addon_type_id' => $data['type'],
        ]);
    }

    public function delete($id) {
        return Addon::destroy($id);
    }
}
