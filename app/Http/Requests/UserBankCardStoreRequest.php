<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserBankCardStoreRequest extends ValidationRequest
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
            'user_bank_card.owner_name' => parent::nameRule(),
            'user_bank_card.bank_name' => parent::nameRule(min: 1),
            'user_bank_card.iban' => 'required|string',
        ];
    }
}
