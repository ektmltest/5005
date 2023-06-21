<?php

namespace App\Http\Livewire\Auth;

use App\Helpers\Mailer;
use App\Http\Requests\ForgetPasswordRequest;
use App\Repositories\ResetPasswordTokenRepository;
use App\Repositories\UserRepository;
use App\Repositories\VerifyEmailRepository;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ForgetPassword extends Component
{
    // public $loading = true;
    public $email;
    protected $resetPasswordRepository;
    protected $userRepository;

    // * constructor
    public function __construct() {
        $this->userRepository = new UserRepository(new VerifyEmailRepository);
        $this->resetPasswordRepository = new ResetPasswordTokenRepository;
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
            $resetPasswordModel = $this->resetPasswordRepository->generate($this->email);
            if (!$this->resetPasswordRepository->sendMail('mails.forget-password', $resetPasswordModel))
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
