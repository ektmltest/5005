<?php

namespace App\Http\Controllers\Api\Payment;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaytabController extends Controller
{
    public function callback(Request $request) {

        try {
            $tran = Transaction::create([
                'tran_ref' => $request->tran_ref,
                'description' => $request->cart_description,
                'currency' => $request->cart_currency,
                'amount' => $request->cart_amount,
                'user_id' => $request->cart_id,
            ]);

            $toAdd = (double) $request->cart_amount;

            $balance = $tran->user->balance;

            $tran->user()->update([
                'balance' => round($balance + $toAdd, 2),
            ]);

            Log::channel('single')->info('transaction created successfully');
        } catch (\Throwable $th) {
            Log::channel('single')->error($th->getMessage());
        }

    }
}
