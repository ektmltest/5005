<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\ReadyProject;
use Illuminate\Http\Request;

class ReadyProjectController extends Controller
{
    public function getReadyProjects()
    {
        $ready_projects = ReadyProject::all();
        return view('Admin.Catalogs.readyProjects' ,compact('ready_projects'));
    }
}
