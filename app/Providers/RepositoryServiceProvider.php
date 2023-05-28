<?php

namespace App\Providers;

use App\Interfaces\GallaryProjectRepositoryInterface;
use App\Interfaces\GallaryProjectTypeRepositoryInterface;
use App\Interfaces\ResetPasswordTokenInterface;
use App\Interfaces\TicketRepositoryInterface;
use App\Interfaces\TicketTypeRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\GallaryProjectRepository;
use App\Repositories\GallaryProjectTypeRepository;
use App\Repositories\ResetPasswordTokenRepository;
use App\Repositories\TicketRepository;
use App\Repositories\TicketTypeRepository;
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
        App::bind(GallaryProjectRepositoryInterface::class, GallaryProjectRepository::class);
        App::bind(GallaryProjectTypeRepositoryInterface::class, GallaryProjectTypeRepository::class);
        App::bind(TicketTypeRepositoryInterface::class, TicketTypeRepository::class);
        App::bind(TicketRepositoryInterface::class, TicketRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
