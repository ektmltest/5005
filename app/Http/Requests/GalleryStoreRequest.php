<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryStoreRequest extends ValidationRequest
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
            'store.desc_ar' => 'required',
            'store.desc_en' => 'required',
            'store.dept_id' => parent::existsRule('gallery_project_types'),
            'image' => parent::fileRule(image: true),
        ];
    }
}
