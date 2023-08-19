<?php

namespace Tests\Feature\Website\Tasks\Auth;

use App\Http\Livewire\Auth\Login;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_livewire_component_existence(): void
    {
        $view = $this->view('login');
        $view->assertSeeLivewire('auth.login');
    }

    public function test_website_login_email_required(): void
    {
        Livewire::test(Login::class)
            ->call('submit')
            ->assertHasErrors([ 'email' => 'required' ]);
    }

    /**
     * @group LoginError
     */
    public function test_website_login_email_exists(): void
    {
        Livewire::test(Login::class)
            ->set('email', 'blabla@blabla.com')
            ->call('submit')
            ->assertHasErrors([ 'email' => 'exists' ]);
    }

    /**
     * @group LoginError
     */
    public function test_website_login_email_should_be_email(): void
    {
        Livewire::test(Login::class)
            ->set('email', 'blabla')
            ->call('submit')
            ->assertHasErrors([ 'email' => 'email' ]);
    }

    public function test_website_login_password_required(): void
    {
        Livewire::test(Login::class)
            ->call('submit')
            ->assertHasErrors([ 'password' => 'required' ]);
    }

    /**
     * @group LoginError
     */
    public function test_website_login_password_min(): void
    {
        Livewire::test(Login::class)
            ->set('password', '5614')
            ->call('submit')
            ->assertHasErrors([ 'password' ]);

        Livewire::test(Login::class)
            ->set('email', User::find(1)->email)
            ->set('password', '5614')
            ->call('submit')
            ->assertHasErrors([ 'password' ]);
    }

    /**
     * @group LoginError
     */
    public function test_website_login_password_wrong() {
        Livewire::test(Login::class)
            ->set('email', User::find(1)->email)
            ->set('password', '5641561469')
            ->call('submit')
            ->assertHasErrors([ 'credentials' ]);
    }

    /**
     * @group LoginError
     */
    public function test_website_login_success() {
        Livewire::test(Login::class)
            ->set('email', User::find(1)->email)
            ->set('password', '@testTest123')
            ->call('submit')
            ->assertHasNoErrors()
            ->assertRedirect(route('home'));

        auth()->logout();
    }
}
