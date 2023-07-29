<?php

namespace App\Http\Controllers\Api\Cart;

use App\Helpers\Localizable;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Interfaces\CartRepositoryInterface;
use App\Interfaces\ReadyProjectRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    use Localizable;

    protected $cartRepository;
    protected $readyProjectRepository;
    protected $response;

    public function __construct(CartRepositoryInterface $cartRepository, ReadyProjectRepositoryInterface $readyProjectRepository, Response $response) {
        $this->cartRepository = $cartRepository;
        $this->readyProjectRepository = $readyProjectRepository;
        $this->response = $response;

        $this->setLocalization();
    }

    public function index() {

        try {

            $cart = $this->cartRepository->get();

            if (!$cart)
                return $this->response->notFound(obj: 'cart');

            return $this->response->ok([
                'message' => 'Here your cart!',
                'data' => $cart
            ]);

        } catch (\Throwable $th) {

            return $this->response->internalServerError($th->getMessage());

        }

    }

    public function create() {

        DB::beginTransaction();
        try {

            $cart = $this->cartRepository->create();

            DB::commit();

            return $this->response->ok([
                'message' => 'Your cart has been created!',
                'data' => $cart
            ]);

        } catch (\Throwable $th) {

            DB::rollBack();
            return $this->response->internalServerError($th->getMessage());

        }

    }

    public function store($project_id) {

        DB::beginTransaction();
        try {

            $project = $this->readyProjectRepository->findById($project_id);

            if (!$project)
                return $this->response->notFound('project');

            $cart = $this->cartRepository->add($project);

            if (!$cart)
                return $this->response->notFound(obj: 'cart');

            if (is_int($cart) && $cart == -1)
                return $this->response->badRequest('This project has already been added!');

            DB::commit();

            return $this->response->ok([
                'message' => 'The project has been added to cart successfully!',
                'data' => $cart
            ]);

        } catch (\Throwable $th) {

            DB::rollBack();
            return $this->response->internalServerError($th->getMessage());

        }

    }

    public function delete($project_id) {

        DB::beginTransaction();
        try {

            $project = $this->readyProjectRepository->findById($project_id);

            if (!$project)
                return $this->response->notFound('project');

            $cart = $this->cartRepository->remove($project);

            if (!$cart)
                return $this->response->notFound(obj: 'cart');

            if (is_int($cart) && $cart == -1)
                return $this->response->badRequest('This project is not in the cart!');

            DB::commit();

            return $this->response->ok([
                'message' => 'The project has been removed from cart successfully!',
                'data' => $cart
            ]);

        } catch (\Throwable $th) {

            DB::rollBack();
            return $this->response->internalServerError($th->getMessage());

        }

    }

    public function destroy() {

        DB::beginTransaction();
        try {

            $cart = $this->cartRepository->delete();

            DB::commit();

            return $this->response->ok([
                'message' => 'Your cart has been deleted!',
                'data' => $cart
            ]);

        } catch (\Throwable $th) {

            DB::rollBack();
            return $this->response->internalServerError($th->getMessage());

        }

    }

    public function reset() {

        DB::beginTransaction();
        try {

            $cart = $this->cartRepository->reset();

            DB::commit();

            return $this->response->ok([
                'message' => 'Your cart has been resetted!',
                'data' => $cart
            ]);

        } catch (\Throwable $th) {

            DB::rollBack();
            return $this->response->internalServerError($th->getMessage());

        }

    }
}
