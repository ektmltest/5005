<?php

namespace App\Http\Livewire\Website;

use App\Repositories\NewspaperRepository;
use Livewire\Component;

class NewspaperIndex extends Component
{
    public $news;
    public $max_count;
    protected $newspaperRepository;

    public function __construct() {
        $this->newspaperRepository = new NewspaperRepository;

        if (!session()->has('loaded'))
            session()->put('loaded', config('globals.home_news'));

        $this->news = $this->newspaperRepository->getAll(limit: session('loaded'));
        $this->max_count = $this->newspaperRepository->count();
    }

    public function loadMore() {
        session()->put('loaded', session('loaded') + config('globals.home_news'));
        $this->news = $this->newspaperRepository->getAll(limit: session('loaded'));
    }

    public function render()
    {
        $this->dispatchBrowserEvent('my:loaded');
        return view('livewire.website.newspaper-index');
    }
}
