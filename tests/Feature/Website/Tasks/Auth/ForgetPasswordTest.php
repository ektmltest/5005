<?php

namespace Tests\Feature\Website\Tasks\Auth;

use App\Http\Livewire\Auth\ForgetPassword;
use App\Http\Livewire\Auth\ForgetPasswordForm;
use App\Models\PasswordResetToken;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\Helpers\TestResponseGenerator;
use Tests\TestCase;

class ForgetPasswordTest extends TestCase
{
    use TestResponseGenerator;
    /**
     * A basic feature test example.
     */
    public function test_livewire_component_existence(): void
    {
        $view = $this->view('forget-password');
        $view->assertSeeLivewire('auth.forget-password');

        $response = $this->generateForgetPasswordFormTestReponse();
        $response->assertSeeLivewire('auth.forget-password-form');
    }

    public function test_forget_password_email_required(): void
    {
        Livewire::test(ForgetPassword::class)
            ->call('submit')
            ->assertHasErrors([ 'email' => 'required' ]);
    }

    public function test_forget_password_email_should_be_an_email(): void
    {
        Livewire::test(ForgetPassword::class)
            ->set('email', 'test')
            ->call('submit')
            ->assertHasErrors([ 'email' => 'email' ]);
    }

    public function test_forget_password_email_exists(): void
    {
        Livewire::test(ForgetPassword::class)
            ->set('email', 'test@test')
            ->call('submit')
            ->assertHasErrors([ 'email' => 'exists' ]);
    }

    public function test_forget_password_first_form_success(): void
    {
        Livewire::test(ForgetPassword::class)
            ->set('email', User::find(1)->email)
            ->call('submit')
            ->assertHasNoErrors();
    }

    public function test_forget_password_form_email_required(): void
    {
        Livewire::test(ForgetPasswordForm::class)
            ->call('submit')
            ->assertHasErrors([ 'email' => 'required' ]);
    }

    public function test_forget_password_form_email_should_be_an_email(): void
    {
        Livewire::test(ForgetPasswordForm::class)
            ->set('email', 'test')
            ->call('submit')
            ->assertHasErrors([ 'email' => 'email' ]);
    }

    public function test_forget_password_form_email_exists(): void
    {
        Livewire::test(ForgetPasswordForm::class)
            ->set('email', 'test@test')
            ->call('submit')
            ->assertHasErrors([ 'email' => 'exists' ]);
    }

    public function test_forget_password_form_password_required(): void
    {
        Livewire::test(ForgetPasswordForm::class)
            ->call('submit')
            ->assertHasErrors([ 'password' => 'required' ]);
    }

    public function test_forget_password_form_success(): void
    {
        $email = User::find(1)->email;
        Livewire::test(ForgetPasswordForm::class)
            ->set('email', $email)
            ->set('password', '@testTest123')
            ->set('password_confirmation', '@testTest123')
            ->set('token', PasswordResetToken::where('email', $email)->first()->token)
            ->call('submit')
            ->assertHasNoErrors()
            ->assertRedirect(route('login'));
    }
}
