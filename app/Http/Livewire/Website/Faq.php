<?php

namespace App\Http\Livewire\Website;

use App\Repositories\QasTypeRepository;
use Livewire\Component;

class Faq extends Component
{
    public $types;

    protected $faqRepository;
    protected $faqTypeRespository;

    public function __construct() {
        $this->faqTypeRespository = new QasTypeRepository;

        $this->types = $this->faqTypeRespository->getAll();
    }

    public function render()
    {
        return view('livewire.website.faq');
    }
}
