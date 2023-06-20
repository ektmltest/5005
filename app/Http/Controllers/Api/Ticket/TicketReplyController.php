<?php

namespace App\Http\Controllers\Api\Ticket;

use App\Helpers\Localizable;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TicketReplyStoreRequest;
use App\Interfaces\TicketReplyRepositoryInterface;
use App\Interfaces\TicketRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketReplyController extends Controller
{
    use Localizable;

    protected TicketReplyRepositoryInterface $ticketReplyRepository;
    protected TicketRepositoryInterface $ticketRepository;
    protected Response $response;

    public function __construct(Response $response, TicketReplyRepositoryInterface $ticketReplyRepository, TicketRepositoryInterface $ticketRepository)
    {
        $this->response = $response;
        $this->ticketReplyRepository = $ticketReplyRepository;
        $this->ticketRepository = $ticketRepository;

        $this->setLocalization();
    }

    public function index($ticket_id) {

        try {

            $ticket = $this->ticketRepository->getTicketById($ticket_id);

            if (!$ticket)
                return $this->response->notFound(obj: 'ticket');

            return $this->response->ok([
                'message' => 'All ticket replies!',
                'data' => $ticket->replies,
            ]);

        } catch (\Throwable $th) {

            return $this->response->internalServerError($th->getMessage());

        }

    }

    public function store(TicketReplyStoreRequest $request, $ticket_id)
    {
        // if fails
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->response->badRequest(__('api/validation.data_not_valid'), $request->validator->errors(), $request->except(['files']));
        }

        DB::beginTransaction();
        try {

            $ticket = $this->ticketRepository->getTicketById($ticket_id);

            if (!$ticket)
                return $this->response->notFound(obj: 'ticket');
            $reply = $this->ticketReplyRepository->store($request, intval($ticket_id));

            DB::commit();

            return $this->response->created([
                'data' => $reply
            ], 'ticket reply');

        } catch (\Throwable $th) {

            DB::rollBack();
            return $this->response->internalServerError($th->getMessage());

        }

    }
}
