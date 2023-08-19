<?php

namespace Tests\Feature\Website\Routes;

use App\Models\User;
use App\Repositories\ResetPasswordTokenRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Helpers\MyAssert;
use Tests\Helpers\TestResponseGenerator;
use Tests\TestCase;

class GuestRouteTest extends TestCase
{
    use MyAssert, TestResponseGenerator;
    /**
     * A basic feature test example.
     */
    public function test_login_route(): void
    {
        $response = $this->get(route('login'));
        $response->assertStatus(200);

        $user = User::find(1);
        $this->assertWithAuth($user, function () {
            $response = $this->get(route('login'));
            $this->assertRedirectHome($response);
        });
    }

    public function test_register_route(): void
    {
        $response = $this->get(route('register'));
        $response->assertStatus(200);

        $user = User::find(1);
        $this->assertWithAuth($user, function () {
            $response = $this->get(route('register'));
            $this->assertRedirectHome($response);
        });
    }

    public function test_forget_password_route(): void
    {
        $response = $this->get(route('password.forget'));
        $response->assertStatus(200);

        $user = User::find(1);
        $this->assertWithAuth($user, function () {
            $response = $this->get(route('password.forget'));
            $this->assertRedirectHome($response);
        });
    }

    public function test_forget_password_form_route(): void
    {
        $response = $this->generateForgetPasswordFormTestReponse();
        $response->assertStatus(200);

        $user = User::find(1);
        $this->assertWithAuth($user, function () {
            $response = $this->generateForgetPasswordFormTestReponse();
            $this->assertRedirectHome($response);
        });
    }
}
