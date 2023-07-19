<?php
namespace App\Http\Livewire\Website;
use App\Http\Requests\ContactStoreRequest;
use App\Models\Like;
use App\Models\Contact;
use Livewire\Component;
use App\Models\ReadyProject;

class Home extends Component
{
    public Contact $contact;

    protected $listeners = [
        'likedEvent' => 'likedEventHandler'
    ];

    public function __construct() {
        $this->contact = new Contact;
    }

    public function rules() {
        return (new ContactStoreRequest)->rules();
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function contact()
    {
        $this->validate();

        $this->contact->save();

        $this->reset();
        session()->flash('message', __('messages.done'));
    }

    public function likedEventHandler() {
        $this->dispatchBrowserEvent('my:loading');
        $this->emit('resetValueOfMaxEvent', 9);
    }


    public function render()
    {
        return view('livewire.website.home', [
            'max' => 9
        ]);
    }
}
