<?php

namespace App\Http\Controllers\Api\Ticket;

use App\Helpers\Localizable;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Interfaces\TicketTypeRepositoryInterface;
use Illuminate\Http\Request;

class TicketTypeController extends Controller
{
    use Localizable;

    protected $ticketTypeRepository;
    protected $response;

    public function __construct(Response $response, TicketTypeRepositoryInterface $ticketTypeRepository) {
        $this->ticketTypeRepository = $ticketTypeRepository;
        $this->response = $response;

        $this->setLocalization();
    }

    public function index() {

        try {

            $types = $this->ticketTypeRepository->getAllTicketTypes();

            if (!$types)
                return $this->response->notFound(obj: 'ticket type');

            return $this->response->ok([
                'message' => 'Ticket types!',
                'data' => $types,
            ]);

        } catch (\Throwable $th) {

            return $this->response->internalServerError($th->getMessage());

        }

    }
}
