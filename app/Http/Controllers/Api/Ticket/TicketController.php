<?php

namespace App\Http\Controllers\Api\Ticket;

use App\Helpers\Localizable;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Interfaces\TicketRepositoryInterface;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    use Localizable;

    protected TicketRepositoryInterface $ticketRepository;
    protected Response $response;

    public function __construct(Response $response, TicketRepositoryInterface $ticketRepository) {
        $this->response = $response;
        $this->ticketRepository = $ticketRepository;

        $this->setLocalization();
    }

    public function index() {

        try {

            $tickets = $this->ticketRepository->getAllTickets();

            return $this->response->ok([
                'message' => 'All tickets!',
                'data' => $tickets,
            ]);

        } catch (\Throwable $th) {

            $this->response->internalServerError($th->getMessage());

        }

    }

    public function showAllAvailableTickets() {

        try {

            $tickets = $this->ticketRepository->getAllAvailableTickets();

            return $this->response->ok([
                'message' => 'All available tickets!',
                'data' => $tickets,
            ]);

        } catch (\Throwable $th) {

            $this->response->internalServerError($th->getMessage());

        }

    }

    public function showAllClosedTickets() {

        try {

            $tickets = $this->ticketRepository->getAllClosedTickets();

            return $this->response->ok([
                'message' => 'All closed tickets!',
                'data' => $tickets,
            ]);

        } catch (\Throwable $th) {

            $this->response->internalServerError($th->getMessage());

        }

    }

    public function show() {

    }
}
