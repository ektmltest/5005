<?php
namespace App\Http\Livewire\Website;
use App\Models\Contact;
use Livewire\Component;

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

        // $this->reset();
        // $this->emit('Your Message Sent Successfully.!');
        // session()->flash('message', 'Your Message Sent Successfully.!');

        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.website.home');
    }
}
