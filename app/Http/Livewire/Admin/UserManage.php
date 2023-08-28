<?php

namespace App\Http\Livewire\Admin;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class UserManage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $filter = 'none';
    public $search = null;

    protected $users;

    protected $userRepository;
    protected $projectRepository;

    public function __construct() {
        $this->userRepository = UserRepository::instance();

        $this->users = $this->userRepository->getAll(paginate: true);
    }

    public function blockMode($id) {
        $this->dispatchBrowserEvent('blockMode', ['id' => $id]);
    }

    public function activateMode($id) {
        $this->dispatchBrowserEvent('activateMode', ['id' => $id]);
    }

    public function activate($id) {

        DB::beginTransaction();
        try {

            $user = $this->userRepository->findById($id);

            if ($user->email_verified_at)
                $user->state = 'activated';
            else
                $user->state = 'pending';
            $user->save();

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }

    }

    public function block($id) {

        DB::beginTransaction();
        try {

            $user = $this->userRepository->findById($id);

            $user->state = 'blocked';
            $user->save();

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }

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
            $users = $this->userRepository->getAll(paginate: true, state: $this->filter);
            return view('livewire.admin.user-manage', [
                'users' => $users,
            ]);
        }

        if ($this->search) {
            $users = $this->userRepository->getAll(paginate: true, needle: $this->search);
            return view('livewire.admin.user-manage', [
                'users' => $users,
            ]);
        }

        $users = $this->userRepository->getAll(paginate: true);
        return view('livewire.admin.user-manage', [
            'users' => $users,
        ]);
    }
}
