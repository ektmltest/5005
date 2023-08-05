<?php
namespace App\Http\Livewire\Website;
use App\Http\Requests\ContactStoreRequest;
use App\Models\Contact;
use App\Repositories\NewspaperRepository;
use App\Repositories\ReadyProjectRepository;
use Livewire\Component;

class Home extends Component
{
    public Contact $contact;
    public $news;
    public $ready_projects;
    // public $statistics = array();
    public $partners;

    protected $newspaperRepository;
    protected $readyProjectRepository;

    public function __construct() {
        $this->contact = new Contact;

        $this->newspaperRepository = new NewspaperRepository;
        $this->readyProjectRepository = new ReadyProjectRepository;

        $this->news = $this->newspaperRepository->getAll(limit: config('globals.home_news'));
        $this->partners = \App\Models\Partner::all();
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


    public function render()
    {
        $this->ready_projects = $this->readyProjectRepository->getAllReadyProjects(max: config('globals.home_store_projects'));
        $this->dispatchBrowserEvent('my:loaded');
        return view('livewire.website.home');
    }
}
