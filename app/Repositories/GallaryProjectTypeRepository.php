<?php

namespace App\Repositories;
use App\Interfaces\GallaryProjectTypeRepositoryInterface;
use App\Models\GalleryProjectType;

class GallaryProjectTypeRepository implements GallaryProjectTypeRepositoryInterface {
    public function getAllTypes($paginate = false, $num = 10) {
        if ($paginate)
            return GalleryProjectType::paginate($num);
        else
            return GalleryProjectType::get();
    }

    public function findByKey($key) {
        return GalleryProjectType::where('key', $key)->first();
    }

    public function findById($id) {
        return GalleryProjectType::find($id);
    }

    public function delete($id) {
        return GalleryProjectType::destroy($id);
    }

    public function store($data) {
        return GalleryProjectType::create([
            'name' => [
                'en' => $data['name_en'],
                'ar' => $data['name_ar']
            ],
            'key' => $data['key'],
            'user_id' => auth()->user()->id,
        ]);
    }
}
