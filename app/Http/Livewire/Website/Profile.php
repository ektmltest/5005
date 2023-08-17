<?php

namespace App\Http\Livewire\Website;

use App\Http\Requests\Charge\ChargeRequest;
use App\Http\Requests\Charge\WithdrawRequest;
use App\Http\Requests\ProfilePasswordUpdateRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\UserBankCardStoreRequest;
use App\Models\Withdrawal;
use App\Repositories\BankCardRepository;
use App\Repositories\ProfileRepository;
use App\Repositories\Transactions\PaymentRepository;
use App\Repositories\Transactions\WithdrawalRepository;
use App\Services\Transactions\PaytabService;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Profile extends Component
{
    use WithFileUploads, WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $status = 'statistics';
    public $withdrawal_status = 'withdrawal';
    public $charge_method = 'bank-card';
    public $user;
    public $profile = array();
    public $uploads = array();
    public $password = array();
    public $bank_cards;
    public $charge = array();
    public $user_bank_card = array();
    public $withdrawal = array();
    public $withdrawals;
    public $pay_iframe = null;

    protected $profileRepository;
    protected $bankCardRepository;
    protected $paymentRepository;
    protected $withdrawalRepository;
    protected $paytabService;

    public function __construct() {
        $this->profileRepository = new ProfileRepository;
        $this->bankCardRepository = new BankCardRepository;
        $this->paymentRepository = new PaymentRepository;
        $this->withdrawalRepository = new WithdrawalRepository;
        $this->paytabService = new PaytabService;

        $this->user = auth()->user();

        $this->profile['fname'] = $this->user->fname;
        $this->profile['lname'] = $this->user->lname;
        $this->profile['phone'] = $this->user->phone;
        $this->profile['country_code'] = $this->user->country_code;

        $this->bank_cards = $this->bankCardRepository->getAll();
    }

    public function rules() {
        return (new ProfileUpdateRequest())->rules();
    }

    public function updated($prop) {
        $this->validateOnly($prop);
    }

    public function update() {
        $this->validate();

        DB::beginTransaction();
        try {

            $this->profileRepository->update($this->profile);

            DB::commit();

            $this->reset();

            $this->dispatchBrowserEvent('my:message.success', ['message' => __('messages.done')]);

        } catch (\Throwable $th) {

            DB::rollBack();
            throw $th;

        }
    }

    public function uploadImage() {
        $this->validate(['uploads.file' => 'required|image']);

        try {

            $this->profileRepository->updateImage($this->uploads['file']);

            DB::commit();

            $this->reset();

            $this->dispatchBrowserEvent('my:message.success', ['message' => __('messages.done')]);

        } catch (\Throwable $th) {

            DB::rollBack();
            throw $th;

        }
    }

    public function updatePassword() {
        $this->validate((new ProfilePasswordUpdateRequest)->rules());

        try {

            if (!$this->profileRepository->checkPassword($this->password['old'])) {
                $this->addError('password.old', __('auth.password'));
                return;
            }

            $this->profileRepository->updatePassword($this->password['new']);

            DB::commit();

            auth()->logout();

            session()->flash('message', __('messages.done'));

            return redirect()->route('login');

        } catch (\Throwable $th) {

            DB::rollBack();
            throw $th;

        }
    }

    public function charge() {
        $this->validate((new ChargeRequest)->rules());

        DB::beginTransaction();
        try {

            $payment = $this->paymentRepository->charge($this->charge);

            DB::commit();

            $this->dispatchBrowserEvent('my:message.success', ['message' => __('messages.done')]);

        } catch (\Throwable $th) {

            DB::rollBack();
            throw $th;

        }
    }

    public function addUserBankCard() {
        $this->validate((new UserBankCardStoreRequest)->rules());

        DB::beginTransaction();
        try {

            $user_bank_card = $this->profileRepository->addBankCard($this->user_bank_card);

            DB::commit();

            $this->dispatchBrowserEvent('my:message.success', ['message' => __('messages.done')]);

        } catch (\Throwable $th) {

            DB::rollBack();
            throw $th;

        }
    }

    public function withdraw() {
        $this->validate((new WithdrawRequest)->rules());

        DB::beginTransaction();
        try {

            $withdraw = $this->withdrawalRepository->withdraw($this->withdrawal);

            if (is_null($withdraw)) {

                DB::commit();
                $this->dispatchBrowserEvent('my:message.error', ['message' => __('messages.account balance error')]);

            } else {

                DB::commit();
                $this->dispatchBrowserEvent('my:message.success', ['message' => __('messages.done')]);

            }

        } catch (\Throwable $th) {

            DB::rollBack();
            throw $th;

        }
    }

    public function revert(Withdrawal $withdrawal) {
        DB::beginTransaction();
        try {

            if ($withdrawal->isPending()) {
                auth()->user()->balance += $withdrawal->invoice_amount;
                auth()->user()->save();
                $withdrawal->delete();
                $this->dispatchBrowserEvent('my:message.success', ['message' => __('messages.done')]);
            } else {
                $this->dispatchBrowserEvent('my:message.error', ['message' => __('messages.withdrawal changed')]);
            }

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();
            throw $th;

        }
    }

    public function generatePayment() {
        $this->validate(['charge.amount' => 'required|numeric']);

        $this->pay_iframe = $this->paytabService->generateIframe($this->charge['amount']);
    }

    public function changeStatus($status) {
        $this->resetAll();
        $this->status = $status;
    }

    public function changeWithdrawalStatus($status) {
        $this->resetAll();
        $this->withdrawal_status = $status;
    }

    public function changeChargeMethod($charge_method) {
        $this->resetAll();
        $this->charge_method = $charge_method;
    }

    private function resetAll() {
        $this->resetExcept('status');
        $this->resetPage();
        $this->resetValidation();
    }

    public function render()
    {
        $this->dispatchBrowserEvent('my:loaded');
        return view('livewire.website.profile', [
            'user_bank_cards' => $this->profileRepository->getBankCards(paginate: true, num: 5),
        ]);
    }
}
