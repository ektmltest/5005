<?php
namespace App\Http\Livewire\Admin;
use App\Models\ProjectCategory;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectCategories extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $cat_id, $category, $name, $name_en, $name_ar, $icon, $start_price, $project_department_id;

    protected $rules = [
        'name_en' => 'required|min:5',
        'name_ar' => 'required|min:5',
        'icon' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function addCategory()
    {
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
        dd('sfdghdfh');
        $this->category = ProjectCategory::find($id);
        $this->category->update([
            'name' => [
                'ar' => $this->name_ar,
                'en' => $this->name_en,
            ],
            'icon' => $this->icon,
            'start_price' => $this->start_price,
            'project_department_id' => $this->project_department_id,
        ]);
        session()->flash('message', 'Category Updated Successfully');
    }



    public function deleteCategorey($id)
    {
        $this->cat_id = ProjectCategory::find($id);
        $this->cat_id->delete();
        session()->flash('message', 'Category Deleted Successfully');
    }
    public function render()
    {
        return view('livewire.admin.project-categories',[
            'categories' => ProjectCategory::paginate(5),
        ]);
    }
}
