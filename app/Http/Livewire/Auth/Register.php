<?php
namespace App\Http\Livewire\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class Register extends Component
{
    public $fname, $lname, $email, $password, $phone, $state, $country_code, $iAgree;


    public function render()
    {
        return view('livewire.auth.register');
    }


    protected $rules = [
        'fname' => 'required|string|max:255',
        'lname' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'password' => 'required|min:8',
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

                $user->visits++;
                $user->save();
                auth()->login($user);
                DB::commit();
                return redirect()->route('home');
            }else{
                $this->addError('agreeMessage', __('errors.checkme'));
            }
            // $this->reset();
            // $this->emit('User Registered.!');
            // session()->flash('message', 'User Registered.!');
        } catch (\Throwable $th) {

            DB::rollBack();
            throw $th;

        }
    }




}
