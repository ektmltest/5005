<?php
namespace App\Http\Livewire\Admin;
use App\Http\Requests\Admin\ProjectCategoryStoreRequest;
use App\Http\Requests\Admin\ProjectCategoryUpdateRequest;
use App\Interfaces\ProjectRepositoryInterface;
use App\Models\ProjectCategory;
use App\Repositories\ProjectAttachmentRepository;
use App\Repositories\ProjectCategoryRepository;
use App\Repositories\ProjectDepartmentRepository;
use App\Repositories\ProjectReplyAttachmentRepository;
use App\Repositories\ProjectReplyRepository;
use App\Repositories\ProjectRepository;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectCategories extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $data = array();
    public $store = array();
    public $category;

    protected $categories;
    protected $listeners = ['resetAction'];
    protected $projectCategoryRepository;
    protected $projectDepartmentRepository;
    protected ProjectRepositoryInterface $projectRepository;

    public function __construct() {
        $this->projectRepository = new ProjectRepository(
            new ProjectAttachmentRepository,
            new ProjectReplyRepository(new ProjectReplyAttachmentRepository)
        );
        $this->projectCategoryRepository = new ProjectCategoryRepository($this->projectRepository);
        $this->projectDepartmentRepository = new ProjectDepartmentRepository($this->projectRepository);

        $this->categories = $this->projectCategoryRepository->getAllCategories();
        foreach($this->categories as $category) {
            $this->data[$category->id]['name_ar'] = $category->nameLocale('ar');
            $this->data[$category->id]['name_en'] = $category->nameLocale('en');
            $this->data[$category->id]['icon'] = $category->icon;
            $this->data[$category->id]['unicode'] = $category->unicode;
            $this->data[$category->id]['dept_id'] = $category->department->id;
            $this->data[$category->id]['price'] = $category->start_price;
            $this->data[$category->id]['color'] = $category->color;
        }
    }

    public function updateMode($id) {
        $this->dispatchBrowserEvent('updateMode', ['id' => $id]);
    }

    public function deleteMode($id) {
        $this->dispatchBrowserEvent('deleteMode', ['id' => $id]);
    }


    public function addCategory()
    {
        $this->validate((new ProjectCategoryStoreRequest())->rules());

        DB::beginTransaction();
        try {

            $this->category = $this->projectCategoryRepository->store($this->store);

            DB::commit();

            $this->reset();
            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw $th;

        }
    }


    public function editCategory($id)
    {
        $this->validate((new ProjectCategoryUpdateRequest())->rules());

        DB::beginTransaction();
        try {

            $this->category = $this->projectCategoryRepository->update($this->data[$id], $id);

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw $th;

        }
    }



    public function deleteCategory($id)
    {
        DB::beginTransaction();
        try {

            $this->projectCategoryRepository->delete($id);

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw $th;

        }
    }

    public function resetErrorMessages() {
        // $this->resetValidation();
        // $this->reset();
        $this->resetAction();
    }

    public function resetAction() {
        $this->reset();
        $this->resetValidation();
    }

    public function render()
    {
        $this->dispatchBrowserEvent('my:loaded');
        return view('livewire.admin.project-categories',[
            'categories' => $this->projectCategoryRepository->getAllCategories(paginate: true),
            'departments' => $this->projectDepartmentRepository->getAllDeparments(),
        ]);
    }
}
