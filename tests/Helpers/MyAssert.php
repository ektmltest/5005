<?php

namespace Tests\Helpers;

use App\Models\User;
use Closure;

trait MyAssert {
    function assertRedirectLogin($response) {
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
        $this->followRedirects($response)
            ->assertSeeLivewire('auth.login');
    }

    function assertRedirectHome($response) {
        $response->assertStatus(302);
        $response->assertRedirect(route('home'));
        $this->followRedirects($response)
            ->assertSeeLivewire('website.home');
    }

    function assertWithAuth(User $user, Closure $callback) {
        auth()->login(User::find(1));
        $callback();
        auth()->logout();
    }
}
