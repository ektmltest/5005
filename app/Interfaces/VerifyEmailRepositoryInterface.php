<?php

namespace App\Interfaces;

interface VerifyEmailRepositoryInterface {

    public function find($email, $token);
    public function findByEmail($email);
    public function generate($email);
}
