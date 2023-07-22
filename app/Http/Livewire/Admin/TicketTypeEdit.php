<?php

namespace App\Http\Livewire\Admin;

use App\Http\Requests\TicketTypeUpdateRequest;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TicketTypeEdit extends Component
{
    public $ticket_type;
    public $data = array();

    public function mount($ticket_type) {
        $this->ticket_type = $ticket_type;
        $this->data['name_ar'] = $ticket_type->nameLocale('ar');
        $this->data['name_en'] = $ticket_type->nameLocale('en');
    }

    public function rules() {
        return (new TicketTypeUpdateRequest())->rules();
    }

    public function editTicketType() {
        // dd($this->data);
        $this->validate();
        dd('test');
        DB::beginTransaction();
        try {

            $this->ticket_type->name = [
                'en' => $this->data['name_en'],
                'ar' => $this->data['name_ar']
            ];

            $this->ticket_type->save();

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }
    }

    public function render()
    {
        $this->dispatchBrowserEvent('my:loaded');
        return view('livewire.admin.ticket-type-edit');
    }
}
