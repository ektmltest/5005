<?php

namespace App\Http\Livewire\Admin;

use App\Helpers\Template;
use App\Http\Requests\Admin\ReadyProjectDepartmentStoreRequest;
use App\Repositories\ReadyProjectDepartmentRepository;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class StoreDepartment extends Component
{
    public $data = array();

    private $departments;
    private $readyProjectDepartmentRepository;

    public function __construct() {
        $this->readyProjectDepartmentRepository = new ReadyProjectDepartmentRepository;
    }

    public function mount() {
    }

    public function rules() {
        return (new ReadyProjectDepartmentStoreRequest)->rules();
    }

    public function updated($property) {
        $this->validateOnly($property);
    }

    public function deleteDeparment($id) {

        DB::beginTransaction();
        try {

            $this->readyProjectDepartmentRepository->delete($id);

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }
    }

    public function addDepartment() {

        $this->validate();

        DB::beginTransaction();
        try {

            $this->readyProjectDepartmentRepository->store($this->data);

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }
    }

    public function render()
    {
        $this->departments = $this->readyProjectDepartmentRepository->getAllDepartments(paginate: true);
        return view('livewire.admin.store-department', [
            'departments' => $this->departments,
        ]);
    }
}
