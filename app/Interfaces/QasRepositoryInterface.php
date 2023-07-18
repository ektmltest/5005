<?php

namespace App\Interfaces;

interface QasRepositoryInterface {
    public function getAll($paginate = false, $num = 10);

    public function delete($id);

    public function store($data);
}
