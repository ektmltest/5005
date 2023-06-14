<?php

namespace App\Http\Controllers\Api\Profile;

use App\Helpers\Localizable;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    use Localizable;

    protected UserRepositoryInterface $ticketRepository;
    protected Response $response;

    public function __construct(Response $response, UserRepositoryInterface $ticketRepository) {
        $this->response = $response;
        $this->ticketRepository = $ticketRepository;

        $this->setLocalization();
    }

    public function index() {
        return $this->response->ok([
            'message' => 'Profile!',
            'data' => auth()->user(),
        ]);
    }

    // public function update() {

    // }
}
