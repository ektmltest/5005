<?php

namespace App\Repositories;

use App\Interfaces\SubscriberRepositoryInterface;
use App\Models\Subscriber;

class SubscriberRepository implements SubscriberRepositoryInterface {

    public function store($email) {
        return Subscriber::create([
            'email' => $email,
        ]);
    }

}
