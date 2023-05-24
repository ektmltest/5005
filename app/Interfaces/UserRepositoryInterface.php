<?php

namespace App\Interfaces;

interface UserRepositoryInterface {
    public function findByEmail(string $email);

    public function changePassword(string $new_password, string $email);
}
