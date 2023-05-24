<?php
namespace App\Http\Livewire\Website;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Project extends Component
{

    public function render(Request $request)
    {
        $project = DB::table('ready_projects')->find($request->id);
        return view('livewire.website.project', compact('project'));
    }
}
