<?php

namespace App\Providers;

use App\Interfaces\ResetPasswordTokenInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\ResetPasswordTokenRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        App::bind(UserRepositoryInterface::class, UserRepository::class);
        App::bind(ResetPasswordTokenInterface::class, ResetPasswordTokenRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
