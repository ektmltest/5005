<?php

namespace App\Http\Livewire\Auth;

use App\Http\Requests\ForgetPasswordFormRequest;
use App\Repositories\ResetPasswordTokenRepository;
use App\Repositories\UserRepository;
use App\Repositories\VerifyEmailRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ForgetPasswordForm extends Component
{
    public $token;
    public $password;
    public $password_confirmation;
    public $email;
    protected $resetPasswordModel;
    protected $resetPasswordTokenRepository;
    protected $userRepository;

    // * constructor
    public function __construct() {
        $this->resetPasswordTokenRepository = new ResetPasswordTokenRepository;
        $this->userRepository = new UserRepository(new VerifyEmailRepository);
    }

    // * mount
    public function mount() {
        if (isset(request()->email)) {
            $this->email = request()->email;
        } else {
            $this->addError('credentials', trans('errors.email_required'));
            $this->email = null;
        }

        $this->resetPasswordModel = $this->resetPasswordTokenRepository->find($this->email, $this->token);

        // dd($this->resetPasswordModel);
        if (!$this->resetPasswordModel) {
            $this->addError('url', trans('errors.url_error'));
        }
    }

    // * to define rules for all post requests comming to this component
    public function rules(): array {
        return (new ForgetPasswordFormRequest)->rules();
    }

    // * to handle realtime validation on single properity at a time
    public function updated($property) {
        $this->validateOnly($property);
    }

    public function submit() {
        $this->validate();

        $this->resetPasswordModel = $this->resetPasswordTokenRepository->find($this->email, $this->token);
        if ($this->resetPasswordModel) {
            DB::beginTransaction();
            try {
                $user = $this->userRepository->changePassword($this->password, $this->email);

                if (!$user)
                    throw new Exception('Error while getting user by email!');


                $this->resetPasswordTokenRepository->delete($this->email, $this->token);

                DB::commit();

                session()->flash('done', trans('messages.done'));

                $this->dispatchBrowserEvent('loaded');

                return redirect()->route('login');

            } catch (\Throwable $th) {
                DB::rollBack();
                throw $th;
            }
        } else {
            throw new Exception('Error while getting reset password token resetPasswordModel!');
        }
    }

    public function render()
    {
        return view('livewire.auth.forget-password-form');
    }
}
