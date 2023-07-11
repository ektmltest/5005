<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Repositories\ReadyProjectRepository;
use Illuminate\Support\Facades\DB;

class ReadyProject extends Component
{
    protected $ready_projects = [];

    protected $readyProjectRepository;

    public function __construct() {
        $this->readyProjectRepository = (new ReadyProjectRepository());
        $this->ready_projects = $this->readyProjectRepository->getAllReadyProjects(paginate: true);
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
        return view('livewire.admin.ready-project', [
            'ready_projects' => $this->ready_projects
        ]);
    }
}
