<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface {
    public function findByEmail(string $email) {
        return User::where('email', $email)->first();
    }

    public function changePassword(string $new_password, string $email) {
        $user = $this->findByEmail($email);

        if (!$user)
            return null;

        $user->password = Hash::make($new_password);
        $user->save();

        return $user;
    }
}
