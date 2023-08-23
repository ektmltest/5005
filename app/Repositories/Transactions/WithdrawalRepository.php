<?php

namespace App\Repositories\Transactions;

use App\Models\User;
use App\Models\Withdrawal;

class WithdrawalRepository {

    public function getAll($paginate = false, $num = 10) {
        if ($paginate)
            return Withdrawal::paginate($num);
        else
            return Withdrawal::all();
    }

    public function getIds($state) {
        return Withdrawal::select('id')->where('state', $state)->get()->pluck('id');
    }

    public function accept(Withdrawal $withdrawal) {
        $withdrawal->state = 'accepted';
        $withdrawal->save();
    }

    public function reject(Withdrawal $withdrawal) {
        $withdrawal->user()->update([
            'balance' => $withdrawal->user->balance + $withdrawal->invoice_amount
        ]);
        $withdrawal->state = 'rejected';
        $withdrawal->save();
    }

    public function revert(Withdrawal $withdrawal) {
        $withdrawal->state = 'pending';
        $withdrawal->save();
    }

    public function withdraw($data): Withdrawal|null {
        $user = auth()->user();
        if ($user->removeFromBalance($data['amount'])) {

            $user->save();

            return Withdrawal::create([
                'state' => 'pending',
                'invoice_amount' => $data['amount'],
                'user_bank_card_id' => $data['user_bank_card_id'],
            ]);

        } else
            return null;
    }

}
