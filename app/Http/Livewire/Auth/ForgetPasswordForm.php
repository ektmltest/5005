<?php

namespace App\Http\Livewire\Auth;

use App\Http\Requests\ForgetPasswordFormRequest;
use App\Repositories\ResetPasswordTokenRepository;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ForgetPasswordForm extends Component
{
    public $token;
    public $password;
    public $password_confirmation;
    public $email;
    protected $model;
    protected $resetPasswordTokenRepository;
    protected $userRepository;

    // * constructor
    public function __construct() {
        $this->resetPasswordTokenRepository = new ResetPasswordTokenRepository;
        $this->userRepository = new UserRepository;
    }

    // * mount
    public function mount() {
        if (isset(request()->email)) {
            $this->email = request()->email;
        } else {
            $this->addError('credentials', trans('errors.email_required'));
            $this->email = null;
        }

        $this->model = $this->resetPasswordTokenRepository->find($this->email, $this->token);
        if (!$this->model) {
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

        if ($this->model) {
            DB::beginTransaction();
            try {
                $user = $this->userRepository->changePassword($this->password, $this->email);

                if (!$user)
                    throw new Exception('Error while getting user by email!');

                $this->model->delete();

                DB::commit();

                return redirect()->route('login')->with('done', trans('done'));
            } catch (\Throwable $th) {
                DB::rollBack();
                throw $th;
            }
        } else {
            throw new Exception('Error while getting reset password token model!');
        }
    }

    public function render()
    {
        return view('livewire.auth.forget-password-form');
    }
}
