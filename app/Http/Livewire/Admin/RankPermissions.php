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

        DB::beginTransaction();
        try {

            $this->rank->permissions()->detach($id);

            DB::commit();

            $this->dispatchBrowserEvent('messageSent', ['message' => __('messages.done')]);

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }

    }

    public function addPermission($id) {

        DB::beginTransaction();
        try {

            $this->rank->permissions()->attach($id);

            DB::commit();

            $this->dispatchBrowserEvent('messageSent', ['message' => __('messages.done')]);

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }

    }

    public function deleteAllPermissions() {
        DB::beginTransaction();
        try {

            $this->rank->permissions()->detach();

            DB::commit();

            $this->dispatchBrowserEvent('messageSent', ['message' => __('messages.done')]);

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }

    }

    public function addAllPermissions() {

        DB::beginTransaction();
        try {

            $this->rank->permissions()->detach();
            $this->rank->permissions()->attach($this->permissions->pluck('id')->toarray());

            DB::commit();

            $this->dispatchBrowserEvent('messageSent', ['message' => __('messages.done')]);

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }

    }

    public function selectFilter() {
        $select = $this->select;
        $this->resetPage();
        $this->select = $select;

        $this->search = null;
        $this->render();
    }

    public function searchFilter() {
        $search = $this->search;
        $this->resetPage();
        $this->search = $search;

        $this->select = null;
        $this->render();
    }


    public function render()
    {
        $this->dispatchBrowserEvent('my:loaded');

        if ($this->search) {
            $permissions = $this->permissionRepository->getAll(paginate: true, needle: $this->search);
            return view('livewire.admin.rank-permissions', [
                'permissions' => $permissions,
            ]);
        }

        if ($this->select) {
            if ($this->select == 'activated')
                $permissions = $this->rank->permissions()->paginate(10);
            else if ($this->select == 'deactivated')
                $permissions = $this->permissionRepository->getFreePermissions(rank_id: $this->rank->id, paginate: true);

            return view('livewire.admin.rank-permissions', [
                'permissions' => $permissions,
            ]);
        }

        $permissions = $this->permissionRepository->getAll(paginate: true);
        return view('livewire.admin.rank-permissions', [
            'permissions' => $permissions,
        ]);
    }
}
