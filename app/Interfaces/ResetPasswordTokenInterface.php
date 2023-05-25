<?php

namespace App\Interfaces;

use App\Models\PasswordResetToken;

interface ResetPasswordTokenInterface {
    public function find(string $email, string $token);

    public function delete(string $email, string $token);

    public function generate(string $email);
}
