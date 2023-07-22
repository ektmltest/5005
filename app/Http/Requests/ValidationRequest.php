<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ValidationRequest extends FormRequest
{
    public $validator = NULL;
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $this->validator = $validator;
    }

    protected function nameRule($min = 3, $max = 255, bool $update = false) {
        $rules = ["min: $min", "max: $max", "string"];

        if (!$update)
            $rules[] = 'required';

        return $rules;
    }

    protected function emailRule(bool $update = false, $exists = false, $table='users', $unique = false) {
        $rules = ['email'];

        if (!$update)
            $rules[] = 'required';

        if ($exists)
            $rules[] = "exists:$table,email";

        if ($unique)
            $rules = "unique:users,email";

        return $rules;
    }

    protected function passwordRule($case, $confirmed = true, $no_strict = false) {
        $rules = [];
        if($case == 'login') {
            array_push($rules, Password::min(8));
            $rules[] = 'required';
        } else if($case == 'register') {
            $rules = array_merge($rules, [
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ]);
            $rules[] = 'required';
        } else if ($case == 'update') {
            $rules = array_merge($rules, [
                $confirmed ? 'confirmed' : '',
                $no_strict ? '' : Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ]);
        }

        return $rules;
    }

    protected function resetPasswordTokenRule() {
        return ['required', 'exists:password_reset_tokens,token'];
    }

    protected function messageRule() {
        return ['required', 'min:10'];
    }

    protected function typeRule() {
        return ['required', 'exists:ticket_types,id'];
    }

    protected function fileRule(bool $update = false, $image = false) {
        $rules = [];
        if (!$update) {
            $rules = ['required', $image ? 'image' : 'file', 'mimes:png,jpg,webp,gif', 'max:10000'];
        }

        return $rules;
    }

    protected function phoneRule(bool $update = false) {
        $rules = ['numeric'];
        if (!$update)
            $rules[] = 'required';
        return $rules;
    }

    protected function phoneCodeRule() {
        return ['required'];
    }

    protected function existsRule($table, $col = 'id', $required = true) {
        $rules = [];
        if ($required)
            $rules[] = 'required';
        $rules[] = "exists:$table,$col";
        return $rules;
    }

    protected function uniqueRule($table, $col = 'id', $except = false, $id = 1, $required = true) {
        $rules = [];
        if ($required)
            $rules[] ='required';
        $rules[] = "unique:$table,$col" . ($except ? ",$id" : '');
        return $rules;
    }

    protected function rateRule() {
        return ['required', 'numeric', 'min:0', 'max:1'];
    }

    protected function priceRule(bool $range = false, float $min = 0, float $max = 9999.99, bool $update = false) {
        if ($update) {
            return ['numeric', $range ? 'between:' . $min . ',' . $max : '', ];
        }

        return ['required', 'numeric', $range ? 'between:' . $min . ',' . $max : '', ];
    }

    protected function numericRule() {
        return ['required', 'numeric'];
    }

    protected function inRule($items) {
        return ['required', 'in:' . implode(',', $items)];
    }
}
