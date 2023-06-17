<?php
namespace App\Http\Livewire\Admin;
use Livewire\Component;
use App\Models\ProjectState;

class ManageProject extends Component
{
    public $state, $state_name, $projects = null;

    public function mount()
    {
        $this->state_name = ProjectState::find(1)->name;
        $this->projects = ProjectState::find(1)->projects;
    }


    public function changeStatus($id)
    {
        $this->state_name = ProjectState::find($id)->name;
        $state = ProjectState::find($id);
        $this->projects = $state->projects;
    }


    public function render()
    {
        return view('livewire.admin.manage-project');
    }
}
