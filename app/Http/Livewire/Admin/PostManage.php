<?php

namespace App\Http\Livewire\Admin;

use App\Repositories\NewspaperRepository;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PostManage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $newspaperRepository;

    public function __construct() {
        $this->newspaperRepository = new NewspaperRepository;
    }

    public function deleteNew($id) {

        DB::beginTransaction();
        try {

            $this->newspaperRepository->delete($id);

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
        return view('livewire.admin.post-manage', [
            'news' => $this->newspaperRepository->getAll(paginate: true),
        ]);
    }
}
