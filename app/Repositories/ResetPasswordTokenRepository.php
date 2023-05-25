<?php

namespace App\Repositories;

use App\Interfaces\ResetPasswordTokenInterface;
use App\Mail\ForgetPasswordMail;
use App\Models\PasswordResetToken;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ResetPasswordTokenRepository implements ResetPasswordTokenInterface {
    public function find(string $email, string $token) {
        return PasswordResetToken::where('email', $email)
            ->where('token', $token)
            ->first();
    }

    public function delete(string $email, string $token) {
        return DB::table('password_reset_tokens')
            ->where('email', $email)
            ->where('token', $token)
            ->delete();
    }

    public function generate(string $email) {
        $reset = PasswordResetToken::where('email', $email)->first();

        if (!$reset)
            $reset = PasswordResetToken::create([
                'email' => $email,
                'token' => Str::random(64),
            ]);

        return $reset;
    }

    public function sendMail(string $mailView, PasswordResetToken $resetPassword) {
        return Mail::to($resetPassword->email)->send(
            new ForgetPasswordMail(
                $mailView,
                $resetPassword->token,
                $resetPassword->email
            )
        );
    }
}
