<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\ValidationRequest;
use Illuminate\Foundation\Http\FormRequest;

class ProjectStoreRequest extends ValidationRequest
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
            'name' => parent::nameRule(),
            'description' => parent::messageRule(),
            'files.*' => parent::fileRule(),
            'categories' => 'required',
            'categories.*' => parent::existsRule('project_categories'),
            'department' => parent::existsRule('project_departments'),
        ];
    }
}
