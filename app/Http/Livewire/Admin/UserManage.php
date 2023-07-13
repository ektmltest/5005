<?php

namespace App\Http\Livewire\Admin;

use App\Repositories\ProjectAttachmentRepository;
use App\Repositories\ProjectCategoryRepository;
use App\Repositories\ProjectReplyAttachmentRepository;
use App\Repositories\ProjectReplyRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\UserRepository;
use App\Repositories\VerifyEmailRepository;
use Livewire\Component;
use Livewire\WithPagination;

class UserManage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $users;

    protected $userRepository;
    protected $projectRepository;

    public function __construct() {
        $this->userRepository = (new UserRepository(new VerifyEmailRepository));
        $this->projectRepository = (new ProjectRepository(new ProjectAttachmentRepository, new ProjectCategoryRepository, new ProjectReplyRepository(new ProjectReplyAttachmentRepository)));

        $this->users = $this->userRepository->getAll(paginate: true);
    }

    public function blockMode($id) {
        $this->dispatchBrowserEvent('blockMode', ['id' => $id]);
    }

    public function activateMode($id) {
        $this->dispatchBrowserEvent('activateMode', ['id' => $id]);
    }

    public function render()
    {
        return view('livewire.admin.user-manage', [
            'users' => $this->userRepository->getAll(paginate: true),
        ]);
    }
}
