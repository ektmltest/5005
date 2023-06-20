<?php

namespace App\Http\Controllers\Api\Auth;

use App\Helpers\Localizable;
use App\Helpers\Mailer;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\VerifyEmailRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    use Mailer, Localizable;

    protected UserRepositoryInterface $userRepository;
    protected Response $response;

    public function __construct(UserRepositoryInterface $userRepository, Response $response) {
        $this->userRepository = $userRepository;
        $this->response = $response;

        $this->setLocalization();
    }

    public function register(RegisterRequest $request) {
        // if fails
        if(isset($request->validator) && $request->validator->fails()) {
            return $this->response->badRequest(__('api/validation.data_not_valid'), $request->validator->errors(), $request->except(['password', 'password_confirmation']));
        }

        DB::beginTransaction();
        try {

            $user = $this->userRepository->store($request);

            $token = $this->userRepository->generateToken();

            if (!$user->verified())
                $this->sendVerificationLink($user->email, api: true);

            DB::commit();

            return $this->response->created(['data' => $user, 'token' => $token], 'user');

        } catch (\Throwable $th) {

            DB::rollBack();
            return $this->response->internalServerError($th->getMessage());

        }
    }

    public function login(LoginRequest $request) {
        // if fails
        if(isset($request->validator) && $request->validator->fails()) {
            return $this->response->badRequest(__('api/validation.data_not_valid'), $request->validator->errors(), $request->except(['password', 'password_confirmation']));
        }

        DB::beginTransaction();
        try {

            $user = $this->userRepository->checkCredentials($request);

            if (!$user)
                return $this->response->forbidden(__('api/validation.wrong_password'));

            if (!$user->verified())
                $this->sendVerificationLink($user->email, api: true);

            $token = $this->userRepository->generateToken();

            DB::commit();

            return $this->response->ok([
                'message' => __('api/messages.signed_in'),
                'token' => $token,
                'data' => $user
            ]);

        } catch (\Throwable $th) {

            DB::rollBack();
            return $this->response->internalServerError($th->getMessage());

        }
    }

    public function logout() {
        auth()->user()->tokens()->delete();

        return $this->response->ok([
            'message' => __('api/messages.signed_out'),
        ]);
    }

    public function verify($token) {

        DB::beginTransaction();
        try {

            if (!request()->has('email'))
                return $this->response->badRequest(__('api/validation.email_not_found'));

            $user = $this->userRepository->verify(request()->get('email'), $token);

            return $this->response->ok([
                'message' => __('api/messages.email_verified'),
                'data' => $user,
            ]);

        } catch (\Throwable $th) {

            DB::rollBack();
            return $this->response->internalServerError($th->getMessage());

        }

    }
}
