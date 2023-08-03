<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBankCard extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function withdrawal() {
        return $this->hasMany(Withdrawal::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
