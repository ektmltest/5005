<?php

namespace App\Repositories\Purchases;

use App\Models\Purchase;

class PurchaseRepository {

    public static function instance() {
        return new self;
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
