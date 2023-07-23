<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends ValidationRequest
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
            'profile.fname' => parent::nameRule(),
            'profile.lname' => parent::nameRule(),
            'profile.phone' => parent::phoneRule(),
            'profile.country_code' => parent::phoneCodeRule()
        ];
    }
}
