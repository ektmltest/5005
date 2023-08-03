<?php

namespace App\Http\Requests\Charge;

use App\Http\Requests\ValidationRequest;
use Illuminate\Foundation\Http\FormRequest;

class ChargeRequest extends ValidationRequest
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
            'charge.bank_card_id' => parent::existsRule('bank_cards'),
            'charge.amount' => parent::priceRule(),
            'charge.file' => parent::fileRule(image: true)
        ];
    }
}
