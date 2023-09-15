<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketingCoupon extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    // * functions
    public function incrementNumOfTransactionsAndSave() {
        $this->num_of_transactions += 1;
        $this->save();
    }

    public function verifyNumOfTransactions() {
        return $this->num_of_transactions < $this->user->marketingLevel->max_transactions;
    }
}
