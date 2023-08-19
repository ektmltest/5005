<?php

namespace Tests\Feature\Website\Routes;

use App\Models\Project;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Helpers\MyAssert;
use Tests\TestCase;

class AuthRouteTest extends TestCase
{
    use MyAssert;

    /**
     * A basic feature test example.
     */
    public function test_my_projects_route(): void
    {
        $response = $this->get(route('myProjects'));
        $this->assertRedirectLogin($response);

        $this->assertWithAuth(User::find(1), function () {
            $this->get(route('myProjects'))
                ->assertStatus(200)
                ->assertSeeLivewire('website.my-projects');
        });
    }

    public function test_my_projects_show_route(): void
    {
        $response = $this->get(route('myProjects.show', 1));
        $this->assertRedirectLogin($response);

        $user = User::find(1);
        $this->assertWithAuth($user, function () use ($user) {
            if ($user->projects()->count() == 0)
                Project::factory()->create([
                    'user_id' => $user->id
                ]);
            $this->get(route('myProjects.show', $user->projects()->first()->id))
                ->assertStatus(200)
                ->assertSeeLivewire('website.my-project-show');
        });
    }

    public function test_my_projects_show_route_that_not_belongs_to_auth_user(): void
    {
        $user = User::find(1);
        $this->assertWithAuth($user, function () use ($user) {
            $this->get(route('myProjects.show', Project::where('user_id', '!=', $user->id)->first()->id))
                ->assertStatus(401);
        });
    }

    public function test_tickets_route(): void
    {
        $response = $this->get(route('tickets'));
        $this->assertRedirectLogin($response);

        $this->assertWithAuth(User::find(1), function () {
            $this->get(route('tickets'))
                ->assertStatus(200)
                ->assertSeeLivewire('website.ticket');
        });
    }

    public function test_tickets_show_route(): void
    {
        $response = $this->get(route('tickets.show', 1));
        $this->assertRedirectLogin($response);

        $user = User::find(1);
        $this->assertWithAuth($user, function () use ($user) {
            if ($user->tickets()->count() == 0)
                Ticket::factory()->create([
                    'user_id' => $user->id
                ]);
            $this->get(route('tickets.show', $user->tickets()->first()->id))
                ->assertStatus(200)
                ->assertSeeLivewire('website.ticket-show');
        });
    }

    public function test_tickets_show_route_that_not_belongs_to_auth_user(): void
    {
        $user = User::find(1);
        $this->assertWithAuth($user, function () use ($user) {
            $this->get(route('tickets.show', Ticket::where('user_id', '!=', $user->id)->first()->id))
                ->assertStatus(401);
        });
    }

    public function test_profile_route(): void
    {
        $response = $this->get(route('myProfile'));
        $this->assertRedirectLogin($response);

        $this->assertWithAuth(User::find(1), function () {
            $this->get(route('myProfile'))
                ->assertStatus(200)
                ->assertSeeLivewire('website.profile');
        });
    }

    public function test_lets_start_route(): void
    {
        $response = $this->get(route('letsStart'));
        $this->assertRedirectLogin($response);

        $this->assertWithAuth(User::find(1), function () {
            $this->get(route('letsStart'))
                ->assertStatus(200)
                ->assertSeeLivewire('website.lets-start');
        });
    }
}
