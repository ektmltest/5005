<?php
namespace App\Http\Livewire\Auth;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $fname, $lname, $email, $password, $phone, $state;


    public function render()
    {
        return view('livewire.auth.register');
    }

    protected $rules = [
        'fname' => 'required|string|max:255',
        'lname' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'password' => 'required|string|min:8',
        'phone' => 'required|numeric',
    ];


    public function updated($property)
    {
        $this->validateOnly($property);
    }


    public function register()
    {
        $this->validate();

        return User::create([
            'fname' => $this->fname,
            'lname' => $this->lname,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'phone' => $this->phone,
            'state' => $this->state,
        ]);
        $this->reset();
        // $this->fname = '';
        // $this->emit('User Registered.!');
        session()->flash('message', 'User Registered.!');
    }




}
