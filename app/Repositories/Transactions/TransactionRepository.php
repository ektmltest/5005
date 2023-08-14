<?php

namespace App\Repositories\Transactions;
use App\Interfaces\TransactionRepositoryInterface;
use App\Models\Transaction;

class TransactionRepository implements TransactionRepositoryInterface {

    public function store($data) {
        return Transaction::create([
            'tran_ref' => $data['tran_ref'],
            'description' => $data['cart_description'],
            'currency' => $data['cart_currency'],
            'amount' => $data['cart_amount'],
            'user_id' => $data['cart_id'],
        ]);
    }

}
