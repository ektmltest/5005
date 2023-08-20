<?php
namespace App\Http\Livewire\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class Register extends Component
{
    public $fname, $lname, $email, $password, $password_confirmation, $phone, $state, $country_code, $iAgree;


    public function render()
    {
        return view('livewire.auth.register');
    }


    protected $rules = [
        'fname' => 'required|string|max:255',
        'lname' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|confirmed|min:8|max:255',
        'phone' => 'required|numeric',
    ];


    public function updated($property)
    {
        $this->validateOnly($property);
    }


    public function register()
    {
        $this->validate();

        DB::beginTransaction();
        try {
            if($this->iAgree){
                $user = User::create([
                    'fname' => $this->fname,
                    'lname' => $this->lname,
                    'email' => $this->email,
                    'password' => Hash::make($this->password),
                    'phone' => $this->phone,
                    'country_code' => '+20',
                    'state' => 'pending',
                    'rank_id' => 1,
                ]);

                $user->incrementVisits();
                $user->save();

                auth()->login($user);

                DB::commit();

                $user->sendVerificationMail();
                return redirect()->route('home');
            } else {
                $this->addError('agreeMessage', __('errors.checkme'));
            }
        } catch (\Throwable $th) {

            DB::rollBack();
            throw $th;

        }
    }
}
