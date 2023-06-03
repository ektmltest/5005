<?php
namespace App\Http\Livewire\Admin;
use App\Models\Project;
use Livewire\Component;
use App\Models\ProjectState;

class ManageProject extends Component
{
    public $id, $state, $state_name, $projects = null;

    public function mount()
    {
        // $this->state_name = ProjectState::find($this->id)->name;
        $this->projects = ProjectState::find(1)->projects;
    }


    public function changeStatus($id)
    {
        // dd($id);
        $state = ProjectState::find($id);
        $this->projects = $state->projects;
    }


    public function render()
    {
        return view('livewire.admin.manage-project');
    }
}
