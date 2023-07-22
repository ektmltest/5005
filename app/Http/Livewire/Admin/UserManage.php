<?php

namespace App\Http\Livewire\Admin;

use App\Repositories\ProjectAttachmentRepository;
use App\Repositories\ProjectCategoryRepository;
use App\Repositories\ProjectReplyAttachmentRepository;
use App\Repositories\ProjectReplyRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\UserRepository;
use App\Repositories\VerifyEmailRepository;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class UserManage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $filter = 'none';

    protected $users;

    protected $userRepository;
    protected $projectRepository;

    public function __construct() {
        $this->userRepository = (new UserRepository(new VerifyEmailRepository));
        // $this->projectRepository = (new ProjectRepository(new ProjectAttachmentRepository, new ProjectCategoryRepository, new ProjectReplyRepository(new ProjectReplyAttachmentRepository)));

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
        $this->render();
    }

    public function render()
    {
        $users = $this->userRepository->getAll(paginate: true, state: $this->filter == 'none' ? null : $this->filter);
        $this->dispatchBrowserEvent('my:loaded');
        return view('livewire.admin.user-manage', [
            'users' => $users,
        ]);
    }
}
