<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\ValidationRequest;
use Illuminate\Foundation\Http\FormRequest;

class QasTypeUpdateRequest extends ValidationRequest
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
            'data.*.name_ar' => parent::nameRule(),
            'data.*.name_en' => parent::nameRule(),
            'data.*.icon' => 'required',
            'data.*.unicode' => 'required',
        ];
    }
}
