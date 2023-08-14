<?php

namespace App\Http\Controllers\Api\Payment;

use App\Http\Controllers\Controller;
use App\Interfaces\TransactionRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PaytabController extends Controller
{
    protected $userRepository;
    protected $transactionRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        TransactionRepositoryInterface $transactionRepository
    ) {
        $this->userRepository = $userRepository;
        $this->transactionRepository = $transactionRepository;
    }

    public function callback(Request $request) {

        DB::beginTransaction();
        try {
            
            // * because we do so when sending the payment checkout
            $user_id = $request->cart_id;

            $tran = $this->transactionRepository->store($request->all());

            $to_added = $tran->amount;

            $this->userRepository->addToBalance($user_id, $to_added);

            DB::commit();

            Log::channel('single')->info('transaction created successfully');

        } catch (\Throwable $th) {

            DB::rollBack();
            Log::channel('single')->error($th->getMessage());

        }

    }
}
