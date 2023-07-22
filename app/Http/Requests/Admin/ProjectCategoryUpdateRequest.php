<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\ValidationRequest;
use Illuminate\Foundation\Http\FormRequest;

class ProjectCategoryUpdateRequest extends ValidationRequest
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
            'data.*.name_ar' => parent::nameRule(),
            'data.*.name_en' => parent::nameRule(),
            'data.*.price' => parent::priceRule(),
            'data.*.icon' => 'required',
            'data.*.unicode' => 'required',
            'data.*.dept_id' => parent::existsRule('project_departments'),
            'data.*.color' => parent::inRule(config('globals.colors'))
        ];
    }
}
