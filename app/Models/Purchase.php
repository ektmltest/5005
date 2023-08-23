<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function project() {
        return $this->belongsTo(ReadyProject::class, 'ready_project_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function addons() {
        return $this->belongsToMany(Addon::class, 'purchase_addons');
    }

    public function replies() {
        return $this->hasMany(PurchaseReply::class);
    }

    // functions
    public function attachToAddons($addons_ids) {
        return $this->addons()->attach($addons_ids);
    }

    // attributes
    public function getFullPriceAttribute() {
        return round($this->project->price + $this->addons->sum('price'), 2);
    }
}
