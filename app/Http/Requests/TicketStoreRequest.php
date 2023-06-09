<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class TicketStoreRequest extends ValidationRequest
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
            'ticket.title' => parent::nameRule(),
            'ticket.description' => parent::messageRule(),
            'ticket.ticket_type_id' => parent::typeRule(),
            'files.*' => parent::fileRule(),
        ];
    }
}
