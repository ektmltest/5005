<?php

namespace App\Http\Livewire\Admin;

use App\Repositories\PermissionRepository;
use App\Repositories\RankRepository;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class RankPermissions extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $rank;
    public $select;
    public $search;

    protected $permissions;
    protected $rankRepository;
    protected $permissionRepository;

    public function __construct() {
        $this->rankRepository = new RankRepository;
        $this->permissionRepository = new PermissionRepository;

        $this->permissions = $this->permissionRepository->getAll();
    }

    public function mount($id) {
        $this->rank = $this->rankRepository->findById($id);
    }

    public function deletePermission($id) {
        $this->dispatchBrowserEvent('my:loading');

        DB::beginTransaction();
        try {

            $this->rank->permissions()->detach($id);

            DB::commit();

            $this->dispatchBrowserEvent('messageSent', ['message' => __('messages.done')]);
            $this->dispatchBrowserEvent('my:loaded');

        } catch (\Throwable $th) {

            DB::rollBack();
            $this->dispatchBrowserEvent('my:loaded');
            throw new \Exception($th->getMessage());

        }

    }

    public function addPermission($id) {
        $this->dispatchBrowserEvent('my:loading');

        DB::beginTransaction();
        try {

            $this->rank->permissions()->attach($id);

            DB::commit();

            $this->dispatchBrowserEvent('messageSent', ['message' => __('messages.done')]);
            $this->dispatchBrowserEvent('my:loaded');

        } catch (\Throwable $th) {

            DB::rollBack();
            $this->dispatchBrowserEvent('my:loaded');
            throw new \Exception($th->getMessage());

        }

    }

    public function deleteAllPermissions() {
        $this->dispatchBrowserEvent('my:loading');

        DB::beginTransaction();
        try {

            $this->rank->permissions()->detach();

            DB::commit();

            $this->dispatchBrowserEvent('messageSent', ['message' => __('messages.done')]);
            $this->dispatchBrowserEvent('my:loaded');

        } catch (\Throwable $th) {

            DB::rollBack();
            $this->dispatchBrowserEvent('my:loaded');
            throw new \Exception($th->getMessage());

        }

    }

    public function addAllPermissions() {
        $this->dispatchBrowserEvent('my:loading');

        DB::beginTransaction();
        try {

            $this->rank->permissions()->detach();
            $this->rank->permissions()->attach($this->permissions->pluck('id')->toarray());

            DB::commit();

            $this->dispatchBrowserEvent('messageSent', ['message' => __('messages.done')]);
            $this->dispatchBrowserEvent('my:loaded');

        } catch (\Throwable $th) {

            DB::rollBack();
            $this->dispatchBrowserEvent('my:loaded');
            throw new \Exception($th->getMessage());

        }

    }

    public function selectFilter() {
        $this->dispatchBrowserEvent('my:loading');

        $select = $this->select;
        $this->resetPage();
        $this->select = $select;

        $this->dispatchBrowserEvent('my:loaded');

        $this->search = null;
        $this->render();
    }

    public function searchFilter() {
        $this->dispatchBrowserEvent('my:loading');

        $search = $this->search;
        $this->resetPage();
        $this->search = $search;

        $this->dispatchBrowserEvent('my:loaded');

        $this->select = null;
        $this->render();
    }


    public function render()
    {
        $this->dispatchBrowserEvent('my:loading');

        $permissions = $this->permissionRepository->getAll(paginate: true);

        if ($this->search) {
            $permissions = $this->permissionRepository->getAll(paginate: true, needle: $this->search);
            $this->dispatchBrowserEvent('my:loaded');
            return view('livewire.admin.rank-permissions', [
                'permissions' => $permissions,
            ]);
        }

        if ($this->select) {
            if ($this->select == 'activated')
                $permissions = $this->rank->permissions()->paginate(10);
            else if ($this->select == 'deactivated')
                $permissions = $this->permissionRepository->getFreePermissions(rank_id: $this->rank->id, paginate: true);

            $this->dispatchBrowserEvent('my:loaded');
            return view('livewire.admin.rank-permissions', [
                'permissions' => $permissions,
            ]);
        }

        $this->dispatchBrowserEvent('my:loaded');
        return view('livewire.admin.rank-permissions', [
            'permissions' => $permissions,
        ]);
    }
}
