<?php

namespace App\Http\Livewire\Admin;

use App\Models\Payment;
use App\Repositories\Transactions\PaymentRepository;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Charges extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'accept' => 'acceptEventHandler',
        'reject' => 'rejectEventHandler',
    ];

    protected $payments;
    protected $pending_payment_ids;

    protected $paymentRepository;

    public function __construct() {
        $this->paymentRepository = new PaymentRepository;
    }

    public function resetAction() {
        $this->reset();
        $this->resetValidation();
    }

    public function revert(Payment $payment) {
        DB::beginTransaction();
        try {

            if (!$this->paymentRepository->revert($payment)) {
                DB::commit();
                session()->flash('error', __('messages.user balance error', ['balance' => $payment->user->balance . ' ' . __('home_trans.SAR')]));
            } else {
                DB::commit();
                session()->flash('message', __('messages.done'));
            }

        } catch (\Throwable $th) {

            DB::rollBack();
            session()->flash('error', __('messages.error'));

        }
    }

    public function acceptEventHandler(Payment $payment) {
        DB::beginTransaction();
        try {

            $this->paymentRepository->accept($payment);

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            session()->flash('error', __('messages.error'));

        }
    }

    public function rejectEventHandler(Payment $payment) {
        DB::beginTransaction();
        try {

            $this->paymentRepository->reject($payment);

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            session()->flash('error', __('messages.error'));

        }
    }

    public function resetValues() {
        $this->payments = $this->paymentRepository->getAll(paginate: true);
        $this->pending_payment_ids = $this->paymentRepository->getIds(state: 'pending');
    }

    public function render()
    {
        $this->resetValues();

        $data = ['pending_payment_ids' => $this->pending_payment_ids];

        $this->dispatchBrowserEvent('my:loaded');
        $this->dispatchBrowserEvent('swal:load', $data);
        return view('livewire.admin.charges', [
            'payments' => $this->payments,
        ]);
    }
}
