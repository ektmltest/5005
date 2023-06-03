<?php
namespace App\Http\Livewire\Admin;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProjectCategory;

class ProjectSections extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $cat_id, $category, $name, $name_en, $name_ar, $icon, $start_price, $project_department_id;
    public $ename_en, $ename_ar, $eicon, $estart_price, $eproject_department_id;

    protected $rules = [
        'name_en' => 'required|min:5',
        'name_ar' => 'required|min:5',
        'icon' => 'required',
        'start_price' => 'required|numeric',
        'project_department_id' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function addCategory()
    {
        $this->validate();
        ProjectCategory::create([
            'name' => [
                'ar' => $this->name_ar,
                'en' => $this->name_en,
            ],
            'icon' => $this->icon,
            'start_price' => $this->start_price,
            'project_department_id' => $this->project_department_id,
        ]);
        $this->reset();
        session()->flash('message', 'Category Successfully Created');
    }


    public function editCategory($id)
    {
        dd('dfghfgdjh');
        $this->category = ProjectCategory::find($id);
        $this->category->update([
            'name' => [
                'ar' => $this->ename_ar,
                'en' => $this->ename_en,
            ],
            'icon' => $this->eicon,
            'start_price' => $this->estart_price,
            'project_department_id' => $this->eproject_department_id,
        ]);
        session()->flash('message', 'Category Updated Successfully.!');
    }



    public function deleteCategory($id)
    {
        $this->cat_id = ProjectCategory::find($id);
        $this->cat_id->delete();
    }


    public function render()
    {
        return view('livewire.admin.project-sections', [
            'categories' => ProjectCategory::paginate(5),
        ]);
    }
}
