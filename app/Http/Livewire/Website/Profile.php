<?php

namespace App\Http\Livewire\Website;

use App\Http\Requests\ProfilePasswordUpdateRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Repositories\BankCardRepository;
use App\Repositories\ProfileRepository;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;
    public $status = 'statistics';
    public $user;
    public $profile = array();
    public $uploads = array();
    public $password = array();
    public $bank_cards;

    protected $profileRepository;
    protected $bankCardRepository;

    public function __construct() {
        $this->profileRepository = new ProfileRepository;
        $this->bankCardRepository = new BankCardRepository;

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

            session()->flash('message', __('messages.done'));

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

            session()->flash('message', __('messages.done'));

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

    public function changeStatus($status) {
        $this->status = $status;
    }

    public function render()
    {
        $this->dispatchBrowserEvent('my:loaded');
        return view('livewire.website.profile');
    }
}
