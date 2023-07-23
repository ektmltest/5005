<?php

namespace App\Repositories;

use App\Models\BankCard;

class BankCardRepository {
    public function getAll() {
        return BankCard::all();
    }
}
