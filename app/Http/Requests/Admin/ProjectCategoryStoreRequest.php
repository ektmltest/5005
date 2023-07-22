<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\ValidationRequest;
use Illuminate\Foundation\Http\FormRequest;

class ProjectCategoryStoreRequest extends ValidationRequest
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
            'store.name_ar' => parent::nameRule(),
            'store.name_en' => parent::nameRule(),
            'store.price' => parent::priceRule(),
            'store.icon' => 'required',
            'store.unicode' => 'required',
            'store.dept_id' => parent::existsRule('project_departments'),
            'store.color' => parent::inRule(config('globals.colors'))
        ];
    }
}
