<?php

namespace Tests\Feature\Website\Routes;

use App\Models\Newspaper;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Helpers\MyAssert;
use Tests\TestCase;

class OtherRouteTest extends TestCase
{
    use MyAssert;
    /**
     * A basic feature test example.
     */
    public function test_faq_route(): void
    {
        $assertion = function () {
            $response = $this->get(route('faq'));
            $response->assertStatus(200);
            $response->assertSeeLivewire('website.faq');
        };
        $assertion();
        $this->assertWithAuth(User::find(1), $assertion);
    }

    public function test_home_route(): void
    {
        $assertion = function () {
            $response = $this->get(route('home'));
            $response->assertStatus(200);
            $response->assertSeeLivewire('website.home');
        };
        $assertion();
        $this->assertWithAuth(User::find(1), $assertion);
    }

    public function test_about_route(): void
    {
        $assertion = function () {
            $response = $this->get(route('about'));
            $response->assertStatus(200);
            $response->assertSeeLivewire('website.about');
        };
        $assertion();
        $this->assertWithAuth(User::find(1), $assertion);
    }

    public function test_store_route(): void
    {
        $assertion = function () {
            $response = $this->get(route('store'));
            $response->assertStatus(200);
            $response->assertSeeLivewire('website.store');
        };
        $assertion();
        $this->assertWithAuth(User::find(1), $assertion);
    }

    public function test_gallary_route(): void
    {
        $assertion = function () {
            $response = $this->get(route('gallary'));
            $response->assertStatus(200);
            $response->assertSeeLivewire('website.gallary');
        };
        $assertion();
        $this->assertWithAuth(User::find(1), $assertion);
    }

    public function test_project_route(): void
    {
        $assertion = function () {
            $response = $this->get(route('project', 1));
            $response->assertStatus(200);
            $response->assertSeeLivewire('website.project');
        };
        $assertion();
        $this->assertWithAuth(User::find(1), $assertion);
    }

    public function test_news_show_route(): void
    {
        $assertion = function () {
            $response = $this->get(route('news.show', Newspaper::limit(1)->first()->slug));
            $response->assertStatus(200);
            $response->assertSeeLivewire('website.newspaper');
        };
        $assertion();
        $this->assertWithAuth(User::find(1), $assertion);
    }

    public function test_news_route(): void
    {
        $assertion = function () {
            $response = $this->get(route('news.index'));
            $response->assertStatus(200);
            $response->assertSeeLivewire('website.newspaper-index');
        };
        $assertion();
        $this->assertWithAuth(User::find(1), $assertion);
    }
}
