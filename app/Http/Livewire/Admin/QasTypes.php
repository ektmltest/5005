<?php

namespace App\Http\Livewire\Admin;

use App\Http\Requests\Admin\QasTypeStoreRequest;
use App\Http\Requests\Admin\QasTypeUpdateRequest;
use App\Repositories\QasTypeRepository;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class QasTypes extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $data = array();
    public $store = array();
    public $type;

    protected $types;
    protected $listeners = ['resetAction'];
    protected $qasTypeRepsitory;

    public function __construct() {
        $this->qasTypeRepsitory = new QasTypeRepository;

        $this->types = $this->qasTypeRepsitory->getAll();
        foreach($this->types as $type) {
            $this->data[$type->id]['name_ar'] = $type->nameLocale('ar');
            $this->data[$type->id]['name_en'] = $type->nameLocale('en');
            $this->data[$type->id]['unicode'] = $type->unicode;
            $this->data[$type->id]['icon'] = $type->icon;
        }
    }

    public function addType() {
        $this->validate((new QasTypeStoreRequest())->rules());
        DB::beginTransaction();
        try {

            $this->type = $this->qasTypeRepsitory->store($this->store);

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }
    }

    public function editType($id) {
        $this->validate((new QasTypeUpdateRequest())->rules());
        DB::beginTransaction();
        try {

            $this->type = $this->qasTypeRepsitory->findById($id);
            $this->type->name = [
                'en' => $this->data[$id]['name_en'],
                'ar' => $this->data[$id]['name_ar']
            ];
            $this->type->icon = $this->data[$id]['icon'];
            $this->type->unicode = $this->data[$id]['unicode'];

            $this->type->save();

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }
    }

    public function deleteType($id) {
        DB::beginTransaction();
        try {

            $this->qasTypeRepsitory->delete($id);

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }
    }

    public function updateMode($id) {
        $this->dispatchBrowserEvent('updateMode', ['id' => $id]);
    }

    public function deleteMode($id) {
        $this->dispatchBrowserEvent('deleteMode', ['id' => $id]);
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
        return view('livewire.admin.qas-types', [
            'types' => $this->qasTypeRepsitory->getAll(paginate: true)
        ]);
    }
}
