<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function userBankCard() {
        return $this->belongsTo(UserBankCard::class);
    }

    public function user() {
        return $this->userBankCard->user();
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
