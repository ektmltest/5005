<?php

namespace App\Repositories;
use App\Interfaces\VerifyEmailRepositoryInterface;
use App\Models\VerifyEmail;
use Illuminate\Support\Str;

class VerifyEmailRepository implements VerifyEmailRepositoryInterface {

    public function find($email, $token) {
        return VerifyEmail::where('email', $email)
            ->where('token', $token)
            ->first();
    }

    public function findByEmail($email) {
        return VerifyEmail::where('email', $email)->first();
    }

    public function generate($email) {
        $model = $this->findByEmail($email);
        if ($model) {
            return $model->token;
        } else {
            $token = Str::random(64);
            $model = VerifyEmail::create([
                'email' => $email,
                'token' => $token,
            ]);

            return $token;
        }
    }
}
