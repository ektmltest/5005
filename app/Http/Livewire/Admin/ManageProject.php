<?php
namespace App\Http\Livewire\Admin;
use Livewire\Component;
use App\Models\ProjectState;

class ManageProject extends Component
{
    public $state, $state_name, $projects = null;

    public function mount()
    {
        $this->state = ProjectState::find(1);
        $this->state_name = $this->state->name;
        $this->projects = ProjectState::find(1)->projects;
    }


    public function changeStatus($id)
    {
        $this->state_name = ProjectState::find($id)->name;
        $this->state = ProjectState::find($id);
        $this->projects = $this->state->projects;
    }


    public function render()
    {
        $this->dispatchBrowserEvent('my:loaded');
        return view('livewire.admin.manage-project');
    }
}
