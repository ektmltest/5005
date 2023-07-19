<?php
namespace App\Http\Livewire\Website;
use App\Repositories\ReadyProjectDepartmentRepository;
use Livewire\Component;

class Store extends Component
{
    public $departments;
    public $active = 0;
    protected $readyProjectDepartmentRepository;
    protected $listeners = [
        'likedEvent' => 'likedEventHandler',
    ];

    public function __construct() {
        $this->readyProjectDepartmentRepository = new ReadyProjectDepartmentRepository;
    }

    public function likedEventHandler() {
        $this->dispatchBrowserEvent('my:loading');
        $this->activate($this->active);
    }

    public function activate($id) {
        $this->active = $id;
        $this->emit('activateEvent', $id);
    }

    public function render()
    {
        $this->departments = $this->readyProjectDepartmentRepository->getAllDepartments();
        return view('livewire.website.store', [
            'departments' => $this->departments,
        ]);
    }
}
