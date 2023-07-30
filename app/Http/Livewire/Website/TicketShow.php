<?php
namespace App\Http\Livewire\Website;
use App\Http\Requests\Api\TicketReplyStoreRequest;
use App\Repositories\TicketAttachmentRepository;
use App\Repositories\TicketReplyAttachmentRepository;
use App\Repositories\TicketReplyRepository;
use App\Repositories\TicketRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class TicketShow extends Component
{
    use WithFileUploads;

    public $ticket;
    public $noFiles = 1;
    public $message;
    public $files = array();

    protected $ticketRepository;
    protected $ticketReplyRepository;
    protected $ticketReplyAttachmentRepository;


    public function __construct() {
        $this->ticketRepository = new TicketRepository(new TicketAttachmentRepository);
        $this->ticketReplyAttachmentRepository = new TicketReplyAttachmentRepository;
        $this->ticketReplyRepository = new TicketReplyRepository($this->ticketReplyAttachmentRepository);
    }

    public function mount($id) {
        $this->ticket = $this->ticketRepository->getTicketById(id: $id, auth: true);
        if (!$this->ticket)
            return abort(401);
    }

    public function rules() {
        return (new TicketReplyStoreRequest)->rules();
    }

    public function updated($prop) {
        $this->validateOnly($prop);
    }

    public function closeTicket() {
        DB::beginTransaction();
        try {

            $this->ticketRepository->closeAvailableTicket($this->ticket);

            DB::commit();

            session('message', __('messages.done'));

            $this->redirect(route('tickets'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw $th;

        }
    }

    public function reply(Request $request) {
        $this->validate();

        DB::beginTransaction();
        try {

            $request->merge(['message' => $this->message]);
            $this->ticketReplyRepository->store($request, $this->ticket->id, $this->files);

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
        return view('livewire.website.ticket-show');
    }
}
