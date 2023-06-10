<?php

namespace App\Interfaces;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

interface UserRepositoryInterface {

    public function store(RegisterRequest $request);

    public function checkCredentials(LoginRequest $request);

    public function generateToken($user = null);

    public function verify($email, $token);

    public function findByEmail(string $email, bool $firstOrFail = false);

    public function changePassword(string $new_password, string $email);
}
