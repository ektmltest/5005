<?php

namespace App\Repositories;
use App\Helpers\File;

class ProfileRepository {
    use File;

    public function update($data) {
        $user = auth()->user();

        $user->fname = $data['fname'];
        $user->lname = $data['lname'];
        $user->phone = $data['phone'];
        $user->country_code = $data['country_code'];

        $user->save();
    }

    public function updateImage($image) {
        $user = auth()->user();
        $this->deleteUsingFilePath($user->avatar_uri);
        $user->avatar = $this->prepareFilePath($image, 'users', true);
        $user->save();
    }

    public function checkPassword($old_password) {
        $current_password = auth()->user()->password;

        return password_verify($old_password, $current_password);
    }

    public function updatePassword($new_password) {
        $user = auth()->user();

        $user->password = bcrypt($new_password);

        $user->save();
    }
}

