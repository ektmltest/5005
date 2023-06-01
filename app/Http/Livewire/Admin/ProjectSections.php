<?php
namespace App\Http\Livewire\Admin;
use Livewire\Component;
use App\Models\ProjectCategory;

class ProjectSections extends Component
{
    public $cat_id, $category, $name;

    protected $rules = [
        'name' => 'required',
        'icon' => 'required',
    ];

    public function editCategory($id)
    {
        $this->validate();
        $this->category = ProjectCategory::find($id);
        $this->category->update([
            'name' => [
                'ar' => $this->name_ar,
                'en' => $this->name_en,
            ],
            'icon' => $this->icon
        ]);
        session()->flash('message', 'Category Deleted Successfully.!');
    }



    public function deleteCategory($id)
    {
        $this->cat_id = ProjectCategory::find($id);
        $this->cat_id->delete();
    }


    public function render()
    {
        return view('livewire.admin.project-sections');
    }
}
