<?php

namespace App\Repositories\Transactions;

use App\Helpers\File;
use App\Models\Payment;

class PaymentRepository {
    use File;

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
        if ($payment->isAccepted()) {
            if ($payment->user->balance >= $payment->invoice_amount)
                $payment->user()->update([
                    'balance' => $payment->user->balance - $payment->invoice_amount
                ]);
            else
                return false;
        }

        $payment->state = 'pending';
        $payment->save();

        return true;
    }

    public function charge($data): Payment {
        return Payment::create([
            'state' => 'pending',
            'invoice_amount' => $data['amount'],
            'invoice_image' => $this->prepareFilePath($data['file'], 'transactions/charges'),
            'bank_card_id' => $data['bank_card_id'],
            'user_id' => auth()->user()->id,
        ]);
    }

}
