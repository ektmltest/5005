<?php
namespace App\Http\Livewire\Website;
use App\Http\Requests\ContactStoreRequest;
use App\Models\Like;
use App\Models\Contact;
use App\Repositories\NewspaperRepository;
use Livewire\Component;
use App\Models\ReadyProject;

class Home extends Component
{
    public Contact $contact;
    public $news;
    // private static $loaded;
    public $max_count;

    protected $listeners = [
        'likedEvent' => 'likedEventHandler'
    ];

    protected $newspaperRepository;

    public function __construct() {
        $this->contact = new Contact;

        $this->newspaperRepository = new NewspaperRepository;

        if (!session()->has('loaded'))
            session()->put('loaded', 2);

        $this->news = $this->newspaperRepository->getAll(limit: session('loaded'));
        $this->max_count = $this->newspaperRepository->count();
    }

    public function mount() {

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

    public function loadMore() {
        // static::$loaded += 2;
        // dd(static::$loaded);
        session()->put('loaded', session('loaded') + 2);
        $this->news = $this->newspaperRepository->getAll(limit: session('loaded'));
    }


    public function render()
    {
        $this->dispatchBrowserEvent('my:loaded');
        return view('livewire.website.home', [
            'max' => 9
        ]);
    }
}
