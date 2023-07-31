<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\ValidationRequest;
use Illuminate\Foundation\Http\FormRequest;

class QasStoreRequest extends ValidationRequest
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
            'store.question_en' => 'required|min:3',
            'store.question_ar' => 'required|min:3',
            'store.answer_en' => 'required|min:3',
            'store.answer_ar' => 'required|min:3',
            'store.key' => parent::uniqueRule('qas', 'key'),
            'store.type_id' => parent::existsRule('qas_types'),
        ];
    }
}
