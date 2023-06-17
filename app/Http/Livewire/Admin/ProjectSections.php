<?php
namespace App\Http\Livewire\Admin;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProjectDepartment;
use Illuminate\Http\Request;

class ProjectSections extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $cat_id, $category, $name, $name_en, $name_ar, $icon;
    public $ename_en, $ename_ar, $eicon;

    protected $rules = [
        'name_en' => 'required|min:5',
        'name_ar' => 'required|min:5',
        'icon' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function addDeparment()
    {
        ProjectDepartment::create([
            'name' => [
                'ar' => $this->name_ar,
                'en' => $this->name_en,
            ],
            'icon' => $this->icon,
        ]);
        $this->reset();
        session()->flash('message', 'Department Successfully Created');
    }


    public function editDeparment(Request $request, $id)
    {
        dd($request);
        $this->category = ProjectDepartment::find($id);
        $this->category->update([
            'name' => [
                'ar' => $request->ename_ar,
                'en' => $request->ename_en,
            ],
            'icon' => $request->eicon,
        ]);
        session()->flash('message', 'Department Updated Successfully');
    }



    public function deleteDeparment($id)
    {
        $this->cat_id = ProjectDepartment::find($id);
        $this->cat_id->delete();
        session()->flash('message', 'Department Deleted Successfully');
    }


    public function render()
    {
        return view('livewire.admin.project-sections', [
            'departments' => ProjectDepartment::paginate(5),
        ]);
    }
}
