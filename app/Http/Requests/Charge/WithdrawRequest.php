<?php

namespace App\Http\Requests\Charge;

use App\Http\Requests\ValidationRequest;
use Illuminate\Foundation\Http\FormRequest;

class WithdrawRequest extends ValidationRequest
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
            'withdrawal.user_bank_card_id' => parent::existsRule('user_bank_cards'),
            'withdrawal.amount' => parent::priceRule(),
        ];
    }
}
