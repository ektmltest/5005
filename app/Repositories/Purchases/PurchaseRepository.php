<?php

namespace App\Repositories\Purchases;

use App\Models\Purchase;

class PurchaseRepository {

    public static function instance() {
        return new self;
    }

    public function getAll($auth = false, $paginate = false, $num = 10) {
        if ($auth)
            if ($paginate)
                return Purchase::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate($num);
            else
                return Purchase::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        else
            if ($paginate)
                return Purchase::orderBy('created_at', 'desc')->paginate($num);
            else
                return Purchase::orderBy('created_at', 'desc')->get();
    }

    public function findById($id) {
        return Purchase::find($id);
    }

    public function storeAndAttachAddons($ready_project_id, $addons_ids): Purchase {
        $purchase = $this->store($ready_project_id);
        $purchase->attachToAddons($addons_ids);
        return $purchase;
    }

    public function store($ready_project_id): Purchase {
        return Purchase::create([
            'ready_project_id' => $ready_project_id,
            'user_id' => auth()->user()->id,
        ]);
    }

}
