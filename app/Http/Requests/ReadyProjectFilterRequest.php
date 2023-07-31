<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReadyProjectFilterRequest extends ValidationRequest
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
            'department_id' => parent::existsRule(table: 'ready_project_departments', required: false),
            'start_price' => parent::priceRule(lte: 'end_price', required_with: 'end_price', update: true),
            'end_price' => parent::priceRule(required_with: 'start_price', update: true),
            'rate' => parent::rateRule(required: false),
            'filtered_with_purchases' => parent::boolRule(),
        ];
    }
}
