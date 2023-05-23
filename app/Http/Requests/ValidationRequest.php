<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ValidationRequest extends FormRequest
{
    protected function nameRule($min = 3, $max = 255, $update = false) {
        $rules = ["min: $min", "max: $max", "string"];

        if (!$update)
            $rules[] = 'required';

        return $rules;
    }

    protected function emailRule($update = false, $exists = false) {
        $rules = ['email'];

        if (!$update)
            $rules[] = 'required';

        if ($exists)
            $rules[] = 'exists:users,email';

        return $rules;
    }

    protected function passwordRule($case) {
        $rules = ['required'];
        if($case == 'login') {
            array_push($rules, Password::min(8));
        } else if($case == 'register' || $case == 'update') {
            $rules = array_merge($rules, [
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ]);
        }

        return $rules;
    }
}
