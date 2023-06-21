<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['projects'];

    protected $appends = ['total_price'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function projects() {
        return $this->belongsToMany(ReadyProject::class, 'cart_ready_projects');
    }

    // **** Attributes **** //
    public function getTotalPriceAttribute() {
        $total_price = 0;
        foreach ($this->projects as $project) {
            $total_price += $project->price;
        }

        return $total_price;
    }
}
