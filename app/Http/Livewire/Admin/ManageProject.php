<?php
namespace App\Http\Livewire\Admin;
use App\Models\Project;
use Livewire\Component;
use App\Models\ProjectState;
use Illuminate\Http\Request;

class ManageProject extends Component
{
    public $state_id, $projects;

    public function changeStatus($id)
    {
        // dd($id);
        $state_id = ProjectState::find($id);
        $this->projects = Project::where('project_state_id', $state_id)->get();
    }


    public function render()
    {
        return view('livewire.admin.manage-project');
    }
}
