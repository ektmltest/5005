<?php
namespace App\Http\Livewire\Admin;
use App\Http\Requests\Admin\QasTypeStoreRequest;
use App\Http\Requests\Admin\QasTypeUpdateRequest;
use App\Repositories\ProjectCategoryRepository;
use App\Repositories\ProjectDepartmentRepository;
use App\Repositories\ProjectReplyAttachmentRepository;
use App\Repositories\ProjectReplyRepository;
use App\Repositories\ProjectRepository;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProjectDepartment;
use App\Repositories\ProjectAttachmentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectSections extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $data = array();
    public $store = array();
    public $department;

    protected $departments;
    protected $listeners = ['resetAction'];

    protected $projectDepartmentRepository;

    public function __construct() {
        $this->projectDepartmentRepository = new ProjectDepartmentRepository(new ProjectRepository(
            new ProjectAttachmentRepository,
            new ProjectReplyRepository(new ProjectReplyAttachmentRepository),
        ));

        $this->departments = $this->projectDepartmentRepository->getAllDeparments();
        foreach($this->departments as $department) {
            $this->data[$department->id]['name_ar'] = $department->nameLocale('ar');
            $this->data[$department->id]['name_en'] = $department->nameLocale('en');
            $this->data[$department->id]['icon'] = $department->icon;
            $this->data[$department->id]['unicode'] = $department->unicode;
        }
    }

    public function updateMode($id) {
        $this->dispatchBrowserEvent('updateMode', ['id' => $id]);
    }

    public function deleteMode($id) {
        $this->dispatchBrowserEvent('deleteMode', ['id' => $id]);
    }


    public function addDepartment()
    {
        $this->validate((new QasTypeStoreRequest())->rules());

        DB::beginTransaction();
        try {

            $this->department = ProjectDepartment::create([
                'name' => [
                    'ar' => $this->store['name_ar'],
                    'en' => $this->store['name_en'],
                ],
                'icon' => $this->store['icon'],
                'unicode' => $this->store['unicode'],
            ]);

            DB::commit();

            $this->reset();
            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw $th;

        }
    }


    public function editDepartment($id)
    {
        $this->validate((new QasTypeUpdateRequest())->rules());

        DB::beginTransaction();
        try {

            $this->department = $this->projectDepartmentRepository->getDepartmentById($id);
            $this->department->update([
                'name' => [
                    'ar' => $this->data[$id]['name_ar'],
                    'en' => $this->data[$id]['name_en'],
                ],
                'icon' => $this->data[$id]['icon'],
                'unicode' => $this->data[$id]['unicode'],
            ]);

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw $th;

        }
    }



    public function deleteDepartment($id)
    {
        DB::beginTransaction();
        try {

            $this->projectDepartmentRepository->delete($id);

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
        return view('livewire.admin.project-sections', [
            'departments' => $this->projectDepartmentRepository->getAllDeparments(paginate: true),
        ]);
    }
}
