<?php

namespace App\Repositories;
use App\Helpers\File;
use App\Models\UserBankCard;

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
        if ($user->avatar)
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

    public function getBankCards($paginate = true, $num = 10) {
        if ($paginate)
            return auth()->user()->bankCards()->paginate($num);
        else
            return auth()->user()->bankCards;
    }

    public function addBankCard($data) {
        return UserBankCard::create([
            'owner_name' => $data['owner_name'],
            'bank_name' => $data['bank_name'],
            'iban' => $data['iban'],
            'user_id' => auth()->user()->id,
        ]);
    }

    public function deleteBankCard($id) {
        return UserBankCard::destroy($id);
    }
}

