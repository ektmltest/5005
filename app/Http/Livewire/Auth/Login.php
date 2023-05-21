<?php
namespace App\Http\Livewire\Auth;
use App\Http\Requests\LoginRequest;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public $test;

    // * to define rules for all post requests comming to this component
    public function rules(): array {
        return (new LoginRequest)->rules();
    }

    // * to handle realtime validation on single properity at a time
    public function updated($property)
    {
        $this->validateOnly($property);
    }

    // * user defined function to handle submit
    public function submit() {
        dd($this->rules());
        $this->validate();

        $email = 'validated';
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
