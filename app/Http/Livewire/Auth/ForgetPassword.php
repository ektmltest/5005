<?php

namespace App\Http\Livewire\Auth;

use App\Helpers\Mailer;
use App\Http\Requests\ForgetPasswordRequest;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ForgetPassword extends Component
{
    use Mailer;

    // public $loading = true;
    public $email;
    protected $userRepository;

    // * constructor
    public function __construct() {
        $this->userRepository = new UserRepository;
    }

    // * mount
    public function mount() {
        // $this->loading = true;
    }

    // * to define rules for all post requests comming to this component
    public function rules(): array {
        return (new ForgetPasswordRequest)->rules();
    }

    // * to handle realtime validation on single properity at a time
    public function updated($property) {
        $this->validateOnly($property);
    }

    // * user defined function to handle submit
    public function submit() {
        $this->validate();

        $user = $this->userRepository->findByEmail($this->email);

        if (!$user) {
            $this->addError('credentials', trans('errors.credentials'));
        } else {
            if (!$this->sendMail('mails.forget-password', $user->email))
                $this->addError('credentials', trans('errors.mail-send'));
            session()->flash('done', trans('mails.forget-password.done'));
        }

        // $this->loading = false;
        $this->dispatchBrowserEvent('loaded');
    }

    public function render()
    {
        // $this->loading = true;
        return view('livewire.auth.forget-password');
    }
}
