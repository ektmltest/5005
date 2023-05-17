<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankCard extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function payments() {
        return $this->hasMany(Payment::class);
    }

    //////* attributes *//////
    public function bankName(): Attribute {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value)
        );
    }
}
