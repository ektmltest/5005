<?php

namespace App\Repositories;
use App\Interfaces\RankRepositoryInterface;
use App\Models\Rank;

class RankRepository implements RankRepositoryInterface {

    public function getAll($type=null) {
        if ($type)
            return Rank::where('rank_type_id', $type)->orderBy('priority', 'DESC')->get();
        else
            return Rank::orderBy('priority', 'DESC')->get();
    }

    public function findById($id) {
        return Rank::find($id);
    }

    public function store($data) {
        return Rank::create([
            'name' => [
                'en' => $data['name_en'],
                'ar' => $data['name_ar']
            ],
            'priority' => $data['priority'],
            'rank_type_id' => $data['type'],
        ]);
    }

    public function delete($id) {
        return Rank::destroy($id);
    }

}
