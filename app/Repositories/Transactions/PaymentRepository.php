<?php

namespace App\Repositories\Transactions;

use App\Models\Payment;

class PaymentRepository {

    public function getAll($paginate = false, $num = 10) {
        if ($paginate)
            return Payment::paginate($num);
        else
            return Payment::all();
    }

    public function getIds($state) {
        return Payment::select('id')->where('state', $state)->get()->pluck('id');
    }

    public function accept(Payment $payment) {
        $payment->user()->update([
            'balance' => $payment->user->balance + $payment->invoice_amount
        ]);
        $payment->state = 'accepted';
        $payment->save();
    }

    public function reject(Payment $payment) {
        $payment->state = 'rejected';
        $payment->save();
    }

    public function revert(Payment $payment) {
        if ($payment->isAccepted())
            $payment->user()->update([
                'balance' => $payment->user->balance - $payment->invoice_amount
            ]);

        $payment->state = 'pending';
        $payment->save();
    }

}
