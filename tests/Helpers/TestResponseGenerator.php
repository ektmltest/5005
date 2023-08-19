<?php

namespace Tests\Helpers;

use App\Models\User;
use App\Repositories\ResetPasswordTokenRepository;

trait TestResponseGenerator {

    public function generateForgetPasswordFormTestReponse() {
        $model = (new ResetPasswordTokenRepository)->generate(User::find(1)->email);
        return $this->get(route('password.forget.form', $model->token));
    }

}
