<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function readyProjects() {
        return $this->belongsToMany(Addon::class, 'ready_project_addons');
    }

    public function type() {
        return $this->belongsTo(AddonType::class, 'addon_type_id');
    }

    public function payments() {
        return $this->belongsToMany(Payment::class, 'payment_addons');
    }
}
