<?php

namespace App\Providers;

use App\Interfaces\GallaryProjectRepositoryInterface;
use App\Interfaces\GallaryProjectTypeRepositoryInterface;
use App\Interfaces\ProjectAttachmentRepositoryInterface;
use App\Interfaces\ProjectCategoryRepositoryInterface;
use App\Interfaces\ProjectDepartmentRepositoryInterface;
use App\Interfaces\ProjectRepositoryInterface;
use App\Interfaces\ReadyProjectDepartmentRepositoryInterface;
use App\Interfaces\ReadyProjectRepositoryInterface;
use App\Interfaces\ResetPasswordTokenInterface;
use App\Interfaces\TicketRepositoryInterface;
use App\Interfaces\TicketTypeRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\VerifyEmailRepositoryInterface;
use App\Repositories\GallaryProjectRepository;
use App\Repositories\GallaryProjectTypeRepository;
use App\Repositories\ProjectAttachmentRepository;
use App\Repositories\ProjectCategoryRepository;
use App\Repositories\ProjectDepartmentRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\ReadyProjectDepartmentRepository;
use App\Repositories\ReadyProjectRepository;
use App\Repositories\ResetPasswordTokenRepository;
use App\Repositories\TicketRepository;
use App\Repositories\TicketTypeRepository;
use App\Repositories\UserRepository;
use App\Repositories\VerifyEmailRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // ? Auth
        App::bind(ResetPasswordTokenInterface::class, ResetPasswordTokenRepository::class);

        // ? User
        App::bind(UserRepositoryInterface::class, UserRepository::class);

        // ? Verify Emails
        App::bind(VerifyEmailRepositoryInterface::class, VerifyEmailRepository::class);

        // ? Gallery Projects
        App::bind(GallaryProjectRepositoryInterface::class, GallaryProjectRepository::class);
        App::bind(GallaryProjectTypeRepositoryInterface::class, GallaryProjectTypeRepository::class);

        // ? Tickets
        App::bind(TicketTypeRepositoryInterface::class, TicketTypeRepository::class);
        App::bind(TicketRepositoryInterface::class, TicketRepository::class);

        // ? projects
        App::bind(ProjectCategoryRepositoryInterface::class, ProjectCategoryRepository::class);
        App::bind(ProjectDepartmentRepositoryInterface::class, ProjectDepartmentRepository::class);
        App::bind(ProjectAttachmentRepositoryInterface::class, ProjectAttachmentRepository::class);
        App::bind(ProjectRepositoryInterface::class, ProjectRepository::class);

        // ? ready projects
        App::bind(ReadyProjectRepositoryInterface::class, ReadyProjectRepository::class);
        App::bind(ReadyProjectDepartmentRepositoryInterface::class, ReadyProjectDepartmentRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
