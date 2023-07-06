<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\ValidationRequest;
use Illuminate\Foundation\Http\FormRequest;

class ReadyProjectStoreRequest extends ValidationRequest
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
            'name_ar' => parent::nameRule(),
            'name_en' => parent::nameRule(),
            'price' => parent::priceRule(),
            'tax' => parent::priceRule(true, 0, 100),
            'dept_id' => parent::existsRule('ready_project_departments'),
            // 'addons_ids' => '',
            // 'addons_ids.*' => parent::existsRule('addons'),
            'link' => 'required|string',
            // 'facilities_ids' => '',
            // 'facilities_ids.*' => parent::existsRule('facilities'),
            // 'tags_ids' => '',
            // 'tags_ids.*' => parent::existsRule('tags'),
            'short_desc_ar' => 'required',
            'short_desc_en' => 'required',
            'desc_ar' => 'required',
            'desc_en' => 'required',
            'image' => parent::fileRule(),
        ];
    }
}
