<?php

namespace App\Http\Livewire\Website;

use App\Http\Requests\Api\TicketReplyStoreRequest;
use App\Models\Purchase;
use App\Repositories\Purchases\PurchaseReplyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class PurchaseShow extends Component
{
    use WithFileUploads;

    public $purchase;
    public $noFiles = 1;
    public $message;
    public $files = array();

    // protected $ticketRepository;
    // protected $ticketReplyRepository;
    // protected $ticketReplyAttachmentRepository;
    protected $purchaseReplyRepository;


    public function __construct() {
        // $this->ticketRepository = new TicketRepository(new TicketAttachmentRepository);
        // $this->ticketReplyAttachmentRepository = new TicketReplyAttachmentRepository;
        // $this->ticketReplyRepository = new TicketReplyRepository($this->ticketReplyAttachmentRepository);
        $this->purchaseReplyRepository = new PurchaseReplyRepository;
    }

    public function mount($id) {
        if (!auth()->check())
            return redirect()->route('login');

        $this->purchase = Purchase::where('user_id', auth()->user()->id)->where('id', $id)->first();

        if (!$this->purchase)
            return abort(404);
    }

    public function rules() {
        return (new TicketReplyStoreRequest())->rules();
    }

    public function updated($prop) {
        $this->validateOnly($prop);
    }

    public function reply(Request $request) {
        $this->validate();

        DB::beginTransaction();
        try {

            $request->merge(['message' => $this->message]);
            $this->purchaseReplyRepository->store($request, $this->purchase->id, $this->files);

            DB::commit();

            $this->reset(['message', 'files']);
            $this->resetValidation();
            session('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw $th;

        }
    }

    public function addBtn()
    {
        $this->noFiles++;
    }

    public function render()
    {
        $this->dispatchBrowserEvent('my:loaded');
        return view('livewire.website.purchase-show');
    }
}
