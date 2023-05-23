<?php

namespace App\Helpers;

use App\Models\PasswordResetToken;
use Illuminate\Support\Str;

trait ResetPassword {
    public function generateResetPasswordToken($email) {
        $reset = PasswordResetToken::where('email', $email)->first();

        if (!$reset)
            $reset = PasswordResetToken::create([
                'email' => $email,
                'token' => Str::random(64),
            ]);

        return $reset->token;
    }
}
