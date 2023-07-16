<?php


namespace App\Repositories;

use App\Interfaces\PermissionRepositoryInterface;
use App\Models\Permission;

class PermissionRepository implements PermissionRepositoryInterface {
    public function getAll($needle = null, $paginate = false, $num = 10) {
        if ($needle)
            if ($paginate)
                return Permission::where('name', 'LIKE', '%'. $needle. '%')->paginate($num);
            else
                return Permission::where('name', 'LIKE', '%'. $needle. '%')->get();
        else
            if ($paginate)
                return Permission::paginate($num);
            else
                return Permission::get();
    }

    public function getFreePermissions($rank_id, $paginate = false, $num = 10) {
        if ($paginate)
            return Permission::whereDoesntHave('ranks', function($q) use ($rank_id) {
                $q->where('rank_id', $rank_id);
            })->paginate($num);
        else
            return Permission::whereDoesntHave('ranks', function($q) use ($rank_id) {
                $q->where('rank_id', $rank_id);
            })->get();
    }
}
