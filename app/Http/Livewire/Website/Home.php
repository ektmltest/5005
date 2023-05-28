<?php
namespace App\Http\Livewire\Website;
use App\Models\Like;
use App\Models\Contact;
use Livewire\Component;
use App\Models\ReadyProject;

class Home extends Component
{
    public $name, $phone, $email, $message;

    protected $rules = [
        'name' => 'required|string|max:255',
        'phone' => 'required|numeric',
        'email' => 'required|email|max:255',
        'message' => 'required|string|min:20',
    ];


    public function updated($property)
    {
        $this->validateOnly($property);
    }


    public function contact()
    {
        $this->validate();
        Contact::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'message' => $this->message,
        ]);

        $this->reset();
        session()->flash('message', 'Your Message Sent Successfully.!');
    }


    public function render()
    {
        return view('livewire.website.home');
    }
}
