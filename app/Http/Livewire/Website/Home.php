<?php
namespace App\Http\Livewire\Website;
use App\Http\Requests\ContactStoreRequest;
use App\Models\Like;
use App\Models\Contact;
use App\Repositories\NewspaperRepository;
use App\Repositories\ReadyProjectRepository;
use Livewire\Component;
use App\Models\ReadyProject;

class Home extends Component
{
    public Contact $contact;
    public $news;
    // private static $loaded;
    public $max_count;
    public $ready_projects;

    protected $newspaperRepository;
    protected $readyProjectRepository;

    public function __construct() {
        $this->contact = new Contact;

        $this->newspaperRepository = new NewspaperRepository;
        $this->readyProjectRepository = new ReadyProjectRepository;


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

    public function toggleLike($ready_project)
    {
        if(!auth()->check()){
            return redirect()->route('login');
        }

        $ready_project = $this->readyProjectRepository->findById($ready_project['id']);
        $isAdded = $this->readyProjectRepository->toggleLike($ready_project);

        if ($isAdded)
            session()->flash('message', __('messages.done'));
        else
            session()->flash('message', __('messages.done'));
    }

    public function loadMore() {
        session()->put('loaded', session('loaded') + 2);
        $this->news = $this->newspaperRepository->getAll(limit: session('loaded'));
    }


    public function render()
    {
        $this->ready_projects = $this->readyProjectRepository->getAllReadyProjects(max: config('globals.store_pagination'));
        $this->dispatchBrowserEvent('my:loaded');
        return view('livewire.website.home');
    }
}
