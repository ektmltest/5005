<?php
namespace App\Http\Livewire\Website;
use App\Repositories\TicketAttachmentRepository;
use App\Repositories\TicketRepository;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TicketShow extends Component
{
    public $ticket;

    protected $ticketRepository;

    public function __construct() {
        $this->ticketRepository = new TicketRepository(new TicketAttachmentRepository);
    }

    public function mount($id) {
        $this->ticket = $this->ticketRepository->getTicketById(id: $id, auth: true);
        if (!$this->ticket)
            return abort(401);
    }

    public function closeTicket() {
        DB::beginTransaction();
        try {

            $this->ticketRepository->closeAvailableTicket($this->ticket);

            DB::commit();

            session('message', __('messages.done'));

            $this->redirect(route('tickets' ));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw $th;

        }
    }

    public function render()
    {
        return view('livewire.website.ticket-show');
    }
}
