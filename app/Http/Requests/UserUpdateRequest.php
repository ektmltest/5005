<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends ValidationRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'fname' => parent::nameRule(update: true),
            'lname' => parent::nameRule(update: true),
            'phone' => parent::phoneRule(update: true),
            'old_password' => parent::passwordRule(case: 'update', confirmed: false, no_strict: true),
            'new_password' => parent::passwordRule(case: 'update'),
            'avatar' => parent::fileRule(update: true),
        ];
    }
}
