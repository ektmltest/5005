<?php

namespace App\Repositories;
use App\Interfaces\FacilityRepositoryInterface;
use App\Models\Facility;

class FacilityRepository implements FacilityRepositoryInterface {
    public function getAll() {
        return Facility::get();
    }

    public function findById($id) {
        return Facility::find($id);
    }

    public function exists($ids) {
        return !Facility::whereIn('id', $ids)->get()->isEmpty();
    }
}
