<?php

namespace App\Repositories;

use App\Helpers\File;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\VerifyEmailRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface {
    use File;
    protected User $user;
    protected VerifyEmailRepositoryInterface $verifyEmailRepository;

    public function __construct(VerifyEmailRepositoryInterface $verifyEmailRepository) {
        $this->verifyEmailRepository = $verifyEmailRepository;
    }

    public function store(RegisterRequest $request) {
        $data = $request->validated();

        $user = new User;
        $user->fname = $data['fname'];
        $user->lname = $data['lname'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->country_code = $data['country_code'];
        $user->phone = $data['phone'];
        $user->rank_id = 1; // TODO: changing this to default rank
        // $user->avatar = $this->prepareFilePath($data['avatar'], 'users', true);

        $user->save();

        $this->user = $user;

        return $user;
    }

    public function update(UserUpdateRequest $request) {
        $data = $request->validated();

        $user = $this->findByEmail(auth()->user()->email);
        $user->fname = isset($data['fname']) ? $data['fname'] : $user->fname;
        $user->lname = isset($data['lname']) ? $data['lname'] : $user->lname;
        $user->phone = isset($data['phone']) ? $data['phone'] : $user->phone;
        $user->avatar = isset($data['avatar']) ? $this->prepareFilePath($data['avatar'], 'users', true) : $user->avatar;

        if (isset($data['old_password'])) {
            if (password_verify($data['old_password'], $user->password)) {
                if (isset($data['new_password'])) {
                    $user->password = bcrypt($data['new_password']);
                    auth()->user()->tokens()->delete();
                } else {
                    return 'new_password_error';
                }
            } else {
                return 'wrong_password_error';
            }
        }

        $user->save();
        $this->user = $user;

        return $user;
    }

    public function checkCredentials(LoginRequest $request) {
        $credentials = $request->validated();

        $this->user = User::where('email', $credentials['email'])->firstOrFail();

        return password_verify($credentials['password'], $this->user->password) ? $this->user : NULL;
    }

    public function generateToken($user = null) {
        if ($user)
            $this->user = $user;

        if (!$this->user)
            throw new \Exception('$this->user is not defined!');

        $this->user->tokens()->delete();

        return $this->user->createToken('user')->plainTextToken;
    }

    public function verify($email, $token) {
        $verifyEmail = $this->verifyEmailRepository->find($email, $token);

        if (!$verifyEmail)
            return null;

        $user = $this->findByEmail($email, firstOrFail: true);
        $user->email_verified_at = now();
        $user->save();

        return $user;
    }

    public function findByEmail(string $email, bool $firstOrFail = false) {
        if ($firstOrFail)
            return User::where('email', $email)->firstOrFail();
        else
            return User::where('email', $email)->first();
    }

    public function changePassword(string $new_password, string $email) {
        $user = $this->findByEmail($email);

        if (!$user)
            return null;

        $user->password = Hash::make($new_password);
        $user->save();

        return $user;
    }
}
