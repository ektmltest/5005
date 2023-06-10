<?php

namespace App\Http\Controllers\Auth;

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
    use Mailer;

    protected UserRepositoryInterface $userRepository;
    protected Response $response;

    public function __construct(UserRepositoryInterface $userRepository, Response $response) {
        $this->userRepository = $userRepository;
        $this->response = $response;
    }

    public function register(RegisterRequest $request) {
        // if fails
        if(isset($request->validator) && $request->validator->fails()) {
            return $this->response->badRequest('Data is not valid!', $request->validator->errors(), $request->except(['password', 'password_confirmation']));
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
            return $this->response->badRequest('Data is not valid!', $request->validator->errors(), $request->except(['password', 'password_confirmation']));
        }

        DB::beginTransaction();
        try {

            $user = $this->userRepository->checkCredentials($request);

            if (!$user)
                return $this->response->forbidden('Wrong password!');

            if (!$user->verified())
                $this->sendVerificationLink($user->email, api: true);

            $token = $this->userRepository->generateToken();

            DB::commit();

            return $this->response->ok([
                'message' => 'Signed in successfully!',
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
            'message' => 'Signed out successfully!',
        ]);
    }

    public function verify($token) {

        DB::beginTransaction();
        try {

            if (!request()->has('email'))
                return $this->response->badRequest('Email is not found.');

            $user = $this->userRepository->verify(request()->get('email'), $token);

            return $this->response->ok([
                'message' => 'User account has been verified!',
                'data' => $user,
            ]);

        } catch (\Throwable $th) {

            DB::rollBack();
            return $this->response->internalServerError($th->getMessage());

        }

    }
}
