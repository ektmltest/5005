<?php
namespace App\Http\Livewire\Auth;
use App\Http\Requests\LoginRequest;
// use App\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\VerifyEmailRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public $rememberme;
    protected $userRepository;

    // * constructor
    public function __construct() {
        $this->userRepository = new UserRepository(new VerifyEmailRepository);
    }

    // * to define rules for all post requests comming to this component
    public function rules(): array {
        return (new LoginRequest)->rules();
    }

    // * to handle realtime validation on single properity at a time
    public function updated($property) {
        $this->validateOnly($property);
    }

    // * user defined function to handle submit
    public function submit() {
        $this->validate();

        DB::beginTransaction();
        try {
            $user = $this->userRepository->findByEmail($this->email);

            if (!$user) {
                $this->addError('credentials', trans('errors.credentials'));
            } else {
                if (!Hash::check($this->password, $user->password)) {
                    // dd('test');
                    $this->addError('credentials',trans ('errors.credentials'));
                } else {
                    $user->incrementVisits();
                    $user->save();
                    auth()->login($user);
                    DB::commit();
                    return redirect()->route('home');
                }
            }
        } catch (\Throwable $th) {

            DB::rollBack();
            throw $th;

        }

    }

    public function render() {
        // if (auth()->check())
        //     auth()->logout();
        return view('livewire.auth.login');
    }
}
