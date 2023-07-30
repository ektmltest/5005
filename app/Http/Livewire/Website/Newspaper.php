<?php

namespace App\Http\Livewire\Website;

use App\Repositories\NewspaperRepository;
use Livewire\Component;

class Newspaper extends Component
{
    public $new;
    public $previous;
    public $next;

    protected $newspaperRepository;

    public function __construct() {
        $this->newspaperRepository = new NewspaperRepository;
    }

    public function mount($slug) {
        $this->new = $this->newspaperRepository->findBySlug($slug);

        if (!$this->new)
            return abort(404);

        $this->next = $this->newspaperRepository->findNext($this->new->id);

        $this->previous = $this->newspaperRepository->findPrevious($this->new->id);
    }

    public function goToPrevious() {
        $this->mount($this->previous->slug);
        $this->dispatchBrowserEvent('uri:changed', ['new_slug' => $this->new->slug]);
    }

    public function goToNext() {
        $this->mount($this->next->slug);
        $this->dispatchBrowserEvent('uri:changed', ['new_slug' => $this->new->slug]);
    }

    public function render()
    {
        $this->dispatchBrowserEvent('my:loaded');
        return view('livewire.website.newspaper');
    }
}
