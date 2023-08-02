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

    //////* functions *///////
    public function getInvoiceAmountAttribute() {
        return round($this->attributes['invoice_amount'], 2);
    }

    public function isPending() {
        return $this->attributes['state'] == 'pending';
    }

    public function isAccepted() {
        return $this->attributes['state'] == 'accepted';
    }

    public function isRejected() {
        return $this->attributes['state'] == 'rejected';
    }
}
