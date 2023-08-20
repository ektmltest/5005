<?php

namespace App\Http\Livewire\Website;

use App\Helpers\Mailer;
use App\Http\Requests\SubscribeStoreRequest;
use App\Repositories\SubscriberRepository;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Subscribe extends Component
{
    use Mailer;

    public $email;

    protected $subscriberRepository;

    public function __construct() {
        $this->subscriberRepository = new SubscriberRepository;
    }

    public function rules() {
        return (new SubscribeStoreRequest)->rules();
    }

    public function submit() {
        $this->validate();

        DB::beginTransaction();
        try {

            $subscriber = $this->subscriberRepository->store($this->email);

            $subscriber->sendWelcomeMail();

            DB::commit();

            $this->dispatchBrowserEvent('my:message.success', ['message' => __('messages.done')]);

        } catch (\Throwable $th) {

            DB::rollBack();
            throw $th;

        }
    }

    public function render()
    {
        $this->dispatchBrowserEvent('my:loaded');
        return view('livewire.website.subscribe');
    }
}
