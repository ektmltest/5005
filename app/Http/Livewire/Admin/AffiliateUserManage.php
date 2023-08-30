<?php

namespace App\Http\Livewire\Admin;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class AffiliateUserManage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $filter = 'none';
    public $search = null;
    public $data = array();

    protected $users;

    protected $userRepository;

    public function __construct() {
        $this->userRepository = UserRepository::instance();

        $this->users = $this->userRepository->getAll(paginate: true);
    }

    public function activateMode($id) {
        $this->dispatchBrowserEvent('activateMode', ['id' => $id]);
    }

    public function activate($id) {
        $this->validate([
            'data.marketing_level_id' => 'required|exists:marketing_levels,id'
        ]);

        DB::beginTransaction();
        try {

            $user = $this->userRepository->findById($id);

            $user->marketing_level_id = $this->data['marketing_level_id'];
            $user->save();

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }

    }

    public function resetForm() {
        $this->resetValidation();
        $this->reset('data');
    }

    public function filterAction() {
        $filter = $this->filter;
        $this->resetPage();
        $this->filter = $filter;

        $this->search = null;
        $this->render();
    }

    public function searchAction() {
        $search = $this->search;
        $this->resetPage();
        $this->search = $search;

        $this->filter = 'none';
        $this->render();
    }

    public function render()
    {
        $this->dispatchBrowserEvent('my:loaded');

        if ($this->filter != 'none') {
            $users = $this->userRepository->getAll(paginate: true, state: $this->filter, sortField: 'marketing_level_id');
            return view('livewire.admin.affiliate-user-manage', [
                'users' => $users,
            ]);
        }

        if ($this->search) {
            $users = $this->userRepository->getAll(paginate: true, needle: $this->search, sortField: 'marketing_level_id');
            return view('livewire.admin.affiliate-user-manage', [
                'users' => $users,
            ]);
        }

        $users = $this->userRepository->getAll(paginate: true, sortField: 'marketing_level_id');
        return view('livewire.admin.affiliate-user-manage', [
            'users' => $users,
        ]);
    }
}
