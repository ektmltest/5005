<?php

namespace App\Repositories;

use App\Interfaces\ResetPasswordTokenInterface;
use App\Models\PasswordResetToken;

class ResetPasswordTokenRepository implements ResetPasswordTokenInterface {
    public function find(string $email, string $token) {
        return PasswordResetToken::where('email', $email)
            ->where('token', $token)
            ->first();
    }
}
