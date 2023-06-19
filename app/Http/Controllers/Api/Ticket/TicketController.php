<?php

namespace App\Http\Controllers\Api\Ticket;

use App\Helpers\Localizable;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TicketStoreRequest;
use App\Interfaces\TicketRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    use Localizable;

    protected TicketRepositoryInterface $ticketRepository;
    protected Response $response;

    public function __construct(Response $response, TicketRepositoryInterface $ticketRepository)
    {
        $this->response = $response;
        $this->ticketRepository = $ticketRepository;

        $this->setLocalization();
    }

    public function index()
    {

        try {

            $tickets = $this->ticketRepository->getAllTickets();

            return $this->response->ok([
                'message' => 'All tickets!',
                'data' => $tickets,
            ]);

        } catch (\Throwable $th) {

            return $this->response->internalServerError($th->getMessage());

        }

    }

    public function showAllAvailableTickets()
    {

        try {

            $tickets = $this->ticketRepository->getAllAvailableTickets();

            return $this->response->ok([
                'message' => 'All available tickets!',
                'data' => $tickets,
            ]);

        } catch (\Throwable $th) {

            return $this->response->internalServerError($th->getMessage());

        }

    }

    public function showAllClosedTickets()
    {

        try {

            $tickets = $this->ticketRepository->getAllClosedTickets();

            return $this->response->ok([
                'message' => 'All closed tickets!',
                'data' => $tickets,
            ]);

        } catch (\Throwable $th) {

            return $this->response->internalServerError($th->getMessage());

        }

    }

    public function show($id)
    {

        try {

            $ticket = $this->ticketRepository->getTicketById($id, auth: true);

            if (!$ticket)
                return $this->response->notFound(obj: 'ticket');

            return $this->response->ok([
                'message' => 'Ticket!',
                'data' => $ticket,
            ]);

        } catch (\Throwable $th) {

            return $this->response->internalServerError($th->getMessage());

        }

    }

    public function store(TicketStoreRequest $request)
    {
        // if fails
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->response->badRequest('Data is not valid!', $request->validator->errors(), $request->except(['files']));
        }

        DB::beginTransaction();
        try {

            $ticket = $this->ticketRepository->prepareTicket($request->except('files'));
            $ticket->save();

            if (isset($request->file()['files']))
                $this->ticketRepository->store($ticket, $request->file()['files']);

            DB::commit();

            return $this->response->created([
                'data' => $this->ticketRepository->getTicketById($ticket->id)
            ], 'ticket');

        } catch (\Throwable $th) {

            DB::rollBack();
            return $this->response->internalServerError($th->getMessage());

        }

    }

    /**
     * close - close an available ticket
     * Precondition: $id should be for available ticket
     *
     * @param $id
     */
    public function closeAvailableTicket($id) {

        DB::beginTransaction();
        try {

            $ticket = $this->ticketRepository->getTicketById($id, auth: true);

            if (!$ticket)
                return $this->response->notFound(obj: 'ticket');

            if ($ticket->status != 'available')
                return $this->response->notFound(obj: 'available ticket');

            $ticket = $this->ticketRepository->closeAvailableTicket($ticket);

            DB::commit();

            return $this->response->ok([
                'message' => 'The ticket has been closed!',
                'data' => $ticket,
            ]);

        } catch (\Throwable $th) {

            DB::rollBack();
            return $this->response->internalServerError($th->getMessage());

        }

    }
}
