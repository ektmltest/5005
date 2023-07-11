<?php

namespace App\Repositories;

use App\Interfaces\ReadyProjectDepartmentRepositoryInterface;
use App\Models\ReadyProjectDepartment;

class ReadyProjectDepartmentRepository implements ReadyProjectDepartmentRepositoryInterface {
    public function getAllDepartments($paginate = false, $num = 5) {
        if ($paginate) {
            return ReadyProjectDepartment::paginate($num);
        } else {
            return ReadyProjectDepartment::orderBy('created_at')->get();
        }
    }

    public function delete($id) {
        return ReadyProjectDepartment::destroy($id);
    }

    public function store($data) {
        return ReadyProjectDepartment::create([
            'name' => [
                'en' => $data['name_en'],
                'ar' => $data['name_ar']
            ],
            'user_id' => auth()->user()->id
        ]);
    }

    public function getDepartmentById($id) {
        return ReadyProjectDepartment::find($id);
    }
}
