<?php

namespace App\Http\Controllers\Api\Profile;

use App\Helpers\Localizable;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    use Localizable;

    protected UserRepositoryInterface $userRepository;
    protected Response $response;

    public function __construct(Response $response, UserRepositoryInterface $userRepository) {
        $this->response = $response;
        $this->userRepository = $userRepository;

        $this->setLocalization();
    }

    public function index() {
        return $this->response->ok([
            'message' => 'Profile!',
            'data' => auth()->user(),
        ]);
    }

    public function update(UserUpdateRequest $request) {
        // if fails
        if(isset($request->validator) && $request->validator->fails()) {
            return $this->response->badRequest('Data is not valid!', $request->validator->errors(), $request->except(['old_password', 'new_password', 'new_password_confirmation']));
        }

        DB::beginTransaction();
        try {

            $res = $this->userRepository->update($request);

            if (is_string($res)) {
                if ($res == 'wrong_password_error')
                    return $this->response->badRequest('Data is not valid!', ['old_password' => 'wrong password!'], $request->except(['old_password', 'new_password', 'new_password_confirmation']));
                else if ($res == 'new_password_error')
                    return $this->response->badRequest('Data is not valid!', ['new_password' => 'new password is required!'], $request->except(['old_password', 'new_password', 'new_password_confirmation']));
                else
                    throw new \Exception('App\Http\Controllers\Api\ProfileController::update() ===> something went wrong!');
            }

            DB::commit();

            return $this->response->ok([
                'message' => 'user data has been updated successfully!',
                'data' => $res
            ]);

        } catch (\Throwable $th) {

            DB::rollBack();
            return $this->response->internalServerError($th->getMessage());

        }
    }
}
