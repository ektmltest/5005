<?php

namespace App\Http\Controllers\Api\Qas;

use App\Helpers\Localizable;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Interfaces\QasRepositoryInterface;
use App\Interfaces\QasTypeRepositoryInterface;
use Illuminate\Http\Request;

class QasController extends Controller
{
    use Localizable;

    protected $qasRepository;
    protected $qasTypeRepository;
    protected $response;

    public function __construct(QasTypeRepositoryInterface $qasTypeRepository, QasRepositoryInterface $qasRepository, Response $response) {
        $this->qasRepository = $qasRepository;
        $this->qasTypeRepository = $qasTypeRepository;
        $this->response = $response;

        $this->setLocalization();
    }

    public function index() {
        return $this->response->ok([
            'message' => 'These are qas!',
            'data' => $this->qasRepository->getAll(paginate: request()->has('paginate')),
        ]);
    }

    public function types() {
        return $this->response->ok([
            'message' => 'These are qas types!',
            'data' => $this->qasTypeRepository->getAll(paginate: request()->has('paginate'), with: ['qas']),
        ]);
    }
}
