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
            $rules = "unique:$table,email";

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

    protected function fileRule(bool $update = false, $image = false, $max = 5120) {
        $rules = [];

        if (!$update) {
            $rules = array_merge($rules, ['required', $image ? 'image' : 'file', 'mimes:png,jpg,webp,gif']);
        }

        if ($max) {
            $rules = array_merge($rules, ['max:' . $max]);
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

    protected function rateRule($required = true) {
        $rules = ['numeric', 'min:0', 'max:1'];
        if ($required)
            $rules[] = 'required';
        return $rules;
    }

    protected function priceRule(bool $range = false, float $min = 0, float $max = 9999.99, $lte = null, $required_with = null, bool $update = false) {
        $rules = ['numeric', 'gte: 0', $range ? 'between:' . $min . ',' . $max : '', ];

        if (!$update)
            $rules[] = 'required';

        if ($lte)
            $rules[] = "lte:$lte";

        if ($required_with)
            $rules[] = "required_with:$required_with";

        return $rules;
    }

    protected function numericRule() {
        return ['required', 'numeric'];
    }

    protected function inRule($items) {
        return ['required', 'in:' . implode(',', $items)];
    }

    protected function boolRule() {
        return ['boolean'];
    }

    protected function slugRule() {
        return ['required', 'string', 'alpha_dash'];
    }
}
