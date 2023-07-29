<?php

namespace App\Interfaces;

use App\Models\ReadyProject;

interface CartRepositoryInterface {

    public function get();

    public function create();

    public function add(ReadyProject $project);

    public function remove(ReadyProject $project);

    public function delete();

    public function reset();

}
