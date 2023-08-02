<?php

namespace App\Http\Livewire\Admin;

use App\Models\Withdrawal;
use App\Repositories\Transactions\WithdrawalRepository;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Withdrawals extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'accept' => 'acceptEventHandler',
        'reject' => 'rejectEventHandler',
    ];

    protected $withdrawals;
    protected $pending_withdrawal_ids;

    protected $withdrawalRepository;

    public function __construct() {
        $this->withdrawalRepository = new WithdrawalRepository;
    }

    public function resetAction() {
        $this->reset();
        $this->resetValidation();
    }

    public function revert(Withdrawal $withdrawal) {
        DB::beginTransaction();
        try {

            $this->withdrawalRepository->revert($withdrawal);

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            session()->flash('error', __('messages.error'));

        }
    }

    public function acceptEventHandler(Withdrawal $withdrawal) {
        DB::beginTransaction();
        try {

            $this->withdrawalRepository->accept($withdrawal);

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            session()->flash('error', __('messages.error'));

        }
    }

    public function rejectEventHandler(Withdrawal $withdrawal) {
        DB::beginTransaction();
        try {

            $this->withdrawalRepository->reject($withdrawal);

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            session()->flash('error', __('messages.error'));

        }
    }

    public function resetValues() {
        $this->withdrawals = $this->withdrawalRepository->getAll(paginate: true);
        $this->pending_withdrawal_ids = $this->withdrawalRepository->getIds(state: 'pending');
    }

    public function render()
    {
        $this->resetValues();

        $data = ['pending_withdrawal_ids' => $this->pending_withdrawal_ids];

        $this->dispatchBrowserEvent('my:loaded');
        $this->dispatchBrowserEvent('swal:load', $data);
        return view('livewire.admin.withdrawals', [
            'withdrawals' => $this->withdrawals,
        ]);
    }
}
