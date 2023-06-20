<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\ValidationRequest;
use Illuminate\Foundation\Http\FormRequest;

class RatingStoreRequest extends ValidationRequest
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
            'rating' => parent::rateRule(),
            'message' => parent::messageRule(),
        ];
    }
}
