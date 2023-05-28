<?php
namespace App\Http\Livewire\Website;
use App\Models\ReadyProject;
use Livewire\Component;

class Like extends Component
{
    public $ready_project;

    public function addorremovelikes($id)
    {
        if(!auth()->check()){
            return redirect()->route('login');
        }
        $ready_project = ReadyProject::find($id);
        if($ready_project->likes->where('user_id', auth()->user()->id)->where('likesable_id', $id)->count() == 0){
            $ready_project->likes()->create([
                'user_id' => auth()->user()->id,
                'likesable_type' => ReadyProject::class,
                'likesable_id' => $id,
            ]);
            session()->flash('message', 'Like Added Successfully');
        }else{
            $ready_project->likes()->delete();
            session()->flash('message', 'Like Removed Successfully');
        }
    }

    public function render()
    {
        return view('livewire.website.like');
    }
}
