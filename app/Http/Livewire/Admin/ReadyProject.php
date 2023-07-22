<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Repositories\ReadyProjectRepository;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class ReadyProject extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $readyProjectRepository;

    public function __construct() {
        $this->readyProjectRepository = (new ReadyProjectRepository());
    }

    public function deleteDeparment($id) {

        DB::beginTransaction();
        try {

            $this->readyProjectRepository->delete($id);

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception('error while deleting ready project');

        }
    }

    public function render()
    {
        $this->dispatchBrowserEvent('my:loaded');
        return view('livewire.admin.ready-project', [
            'ready_projects' => $this->readyProjectRepository->getAllReadyProjects(paginate: true)
        ]);
    }
}
