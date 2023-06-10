<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends ValidationRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'fname' => parent::nameRule(),
            'lname' => parent::nameRule(),
            'email' => parent::emailRule(unique: true),
            'password' => parent::passwordRule(case: 'register'),
            'country_code' => parent::phoneCodeRule(),
            'phone' => parent::phoneRule(),
        ];
    }
}
