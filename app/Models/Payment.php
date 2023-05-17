<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function addons() {
        return $this->belongsToMany(Addon::class, 'payment_addons');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function readyProject() {
        return $this->belongsTo(ReadyProject::class);
    }

    public function bankCard() {
        return $this->belongsTo(BankCard::class);
    }
}
