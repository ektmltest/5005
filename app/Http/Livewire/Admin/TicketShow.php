<?php

namespace App\Http\Livewire\Admin;

use App\Http\Requests\Api\TicketReplyStoreRequest;
use App\Models\Ticket;
use App\Repositories\TicketReplyRepository;
use App\Repositories\TicketRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class TicketShow extends Component
{
    use WithFileUploads;

    public Ticket $ticket;
    public $message;
    public $noFiles = 1;
    public $files = array();
    public $replies;
    public $max_count;
    public $participants = array();

    protected $ticketRepository;
    protected $ticketReplyRepository;

    public function __construct() {
        $this->ticketReplyRepository = TicketReplyRepository::instance();
        $this->ticketRepository = TicketRepository::instance();
    }

    public function mount($id) {
        if (!session()->has('loaded'))
            session()->put('loaded', config('globals.max_replies'));

        $this->initVariables($id);
    }

    public function reply(Request $request) {
        $this->validate((new TicketReplyStoreRequest)->rules());

        DB::beginTransaction();
        try {

            $request->merge(['message' => $this->message]);
            $this->ticketReplyRepository->store($request, $this->ticket->id, $this->files);

            DB::commit();

            $this->reset(['message', 'files', 'participants']);
            $this->resetValidation();

            $this->initVariables($this->ticket->id);

            $this->dispatchBrowserEvent('my:message.success', ['message' => __('messages.done')]);

        } catch (\Throwable $th) {

            DB::rollBack();
            throw $th;

        }
    }

    public function closeTicket() {
        DB::beginTransaction();
        try {

            $this->ticketRepository->closeAvailableTicket($this->ticket);

            DB::commit();

            $this->dispatchBrowserEvent('my:message.success', ['message' => __('messages.done')]);

        } catch (\Throwable $th) {

            DB::rollBack();
            throw $th;

        }
    }

    public function addBtn()
    {
        $this->noFiles++;
    }

    public function loadMore() {
        session()->put('loaded', session('loaded') + config('globals.max_replies'));
        $this->replies = $this->ticket->replies(limit: session('loaded'), ordered: 'desc')->get();
    }

    protected function initVariables($id) {
        $this->ticket = $this->ticketRepository->getTicketById($id);
        $this->replies = $this->ticket->replies(limit: session('loaded'), ordered: 'desc')->get();
        $this->max_count = $this->ticket->replies()->count();
        $isTicketCreatorInRepliers = false;
        foreach ($this->ticket->replies->unique('user_id') as $reply) {
            if ($reply->user->id == $this->ticket->user->id)
                $isTicketCreatorInRepliers = true;
            $this->participants[] = $reply->user->toArray();
        }
        if (!$isTicketCreatorInRepliers)
            $this->participants[] = $this->ticket->user->toArray();
    }

    public function render()
    {
        $this->dispatchBrowserEvent('my:loaded');
        return view('livewire.admin.ticket-show');
    }
}
