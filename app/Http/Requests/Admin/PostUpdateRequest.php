<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\ValidationRequest;
use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends ValidationRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'new.title_ar' => parent::nameRule(),
            'new.title_en' => parent::nameRule(),
            'new.slug' => parent::slugRule(),
            'image' => parent::fileRule(image: true, update: true),
        ];
    }
}
