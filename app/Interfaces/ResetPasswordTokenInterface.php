<?php

namespace App\Interfaces;

use App\Models\PasswordResetToken;

interface ResetPasswordTokenInterface {
    public function find(string $email, string $token);
}
