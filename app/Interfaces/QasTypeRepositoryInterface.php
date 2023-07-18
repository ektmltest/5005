<?php

namespace App\Interfaces;

interface QasTypeRepositoryInterface {
    public function findById($id);

    public function getAll($paginate = false, $num = 10, $with = null);

    public function delete($id);

    public function store($data);
}
