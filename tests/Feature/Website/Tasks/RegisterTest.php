<?php

namespace Tests\Feature\Website\Tasks;

use App\Http\Livewire\Auth\Register;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_livewire_component_existence(): void
    {
        $view = $this->view('register');
        $view->assertSeeLivewire('auth.register');
    }

    public function test_website_register_email(): void
    {
        $email_test_cases = [
            'test',
            '',
            User::find(1)->email,
            'blablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablabla'
        ];

        foreach ($email_test_cases as $test_case)
            Livewire::test(Register::class)
                ->set('email', $test_case)
                ->call('register')
                ->assertHasErrors([ 'email' ]);
    }

    public function test_website_register_name(): void
    {
        $name_test_cases = [
            '',
            5,
            true,
            5.5,
            -5,
            0,
            'blablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablabla',
        ];

        foreach ($name_test_cases as $test_case)
            Livewire::test(Register::class)
                ->set('fname', $test_case)
                ->set('lname', $test_case)
                ->call('register')
                ->assertHasErrors([ 'fname', 'lname' ]);
    }

    public function test_website_register_password(): void
    {
        $password_test_cases = [
            '',
            5,
            true,
            5.5,
            -5,
            0,
            'blablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablabla',
            '123456789'
        ];

        $confirm_test_cases = [
            '',
            5,
            true,
            5.5,
            -5,
            0,
            'blablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablabla',
            '46545646416'
        ];

        $i = 0;
        foreach ($password_test_cases as $test_case)
            Livewire::test(Register::class)
                ->set('password', $test_case)
                ->set('password_confirmation', ($i % 2 == 0) ? $confirm_test_cases[$i++] : '')
                ->call('register')
                ->assertHasErrors([ 'password' ]);
    }

    public function test_website_register_phone(): void
    {
        $phone_test_cases = [
            '',
            '4854964asgdasjgopids',
        ];

        foreach ($phone_test_cases as $test_case)
            Livewire::test(Register::class)
                ->set('phone', $test_case)
                ->call('register')
                ->assertHasErrors([ 'phone' ]);
    }

    public function test_website_register_without_check_iagree_button(): void
    {
        Livewire::test(Register::class)
            ->set('email', 'test@example.com')
            ->set('password', '123456789')
            ->set('password_confirmation', '123456789')
            ->set('fname', 'kareem')
            ->set('lname', 'shaaban')
            ->set('phone', '123456789')
            ->call('register')
            ->assertHasErrors([ 'agreeMessage' ]);
    }

    public function test_website_register_success(): void
    {
        Livewire::test(Register::class)
            ->set('email', 'test@example.com')
            ->set('password', '123456789')
            ->set('password_confirmation', '123456789')
            ->set('fname', 'kareem')
            ->set('lname', 'shaaban')
            ->set('phone', '123456789')
            ->set('iAgree', true)
            ->call('register')
            ->assertHasNoErrors()
            ->assertRedirect(route('home'));
    }
}
