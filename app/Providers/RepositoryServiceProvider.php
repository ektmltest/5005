<?php

namespace App\Providers;

use App\Interfaces\CartRepositoryInterface;
use App\Interfaces\GallaryProjectRepositoryInterface;
use App\Interfaces\GallaryProjectTypeRepositoryInterface;
use App\Interfaces\ProjectAttachmentRepositoryInterface;
use App\Interfaces\ProjectCategoryRepositoryInterface;
use App\Interfaces\ProjectDepartmentRepositoryInterface;
use App\Interfaces\ProjectReplyAttachmentRepositoryInterface;
use App\Interfaces\ProjectReplyRepositoryInterface;
use App\Interfaces\ProjectRepositoryInterface;
use App\Interfaces\QasRepositoryInterface;
use App\Interfaces\QasTypeRepositoryInterface;
use App\Interfaces\ReadyProjectDepartmentRepositoryInterface;
use App\Interfaces\ReadyProjectRepositoryInterface;
use App\Interfaces\ResetPasswordTokenInterface;
use App\Interfaces\TicketAttachmentRepositoryInterface;
use App\Interfaces\TicketReplyAttachmentRepositoryInterface;
use App\Interfaces\TicketReplyRepositoryInterface;
use App\Interfaces\TicketRepositoryInterface;
use App\Interfaces\TicketTypeRepositoryInterface;
use App\Interfaces\TransactionRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\VerifyEmailRepositoryInterface;
use App\Repositories\CartRepository;
use App\Repositories\GallaryProjectRepository;
use App\Repositories\GallaryProjectTypeRepository;
use App\Repositories\ProjectAttachmentRepository;
use App\Repositories\ProjectCategoryRepository;
use App\Repositories\ProjectDepartmentRepository;
use App\Repositories\ProjectReplyAttachmentRepository;
use App\Repositories\ProjectReplyRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\QasRepository;
use App\Repositories\QasTypeRepository;
use App\Repositories\ReadyProjectDepartmentRepository;
use App\Repositories\ReadyProjectRepository;
use App\Repositories\ResetPasswordTokenRepository;
use App\Repositories\TicketAttachmentRepository;
use App\Repositories\TicketReplyAttachmentRepository;
use App\Repositories\TicketReplyRepository;
use App\Repositories\TicketRepository;
use App\Repositories\TicketTypeRepository;
use App\Repositories\TransactionRepository;
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
        App::bind(TicketAttachmentRepositoryInterface::class, TicketAttachmentRepository::class);
        // Ticket replies
        App::bind(TicketReplyRepositoryInterface::class, TicketReplyRepository::class);
        App::bind(TicketReplyAttachmentRepositoryInterface::class, TicketReplyAttachmentRepository::class);

        // ? projects
        App::bind(ProjectCategoryRepositoryInterface::class, ProjectCategoryRepository::class);
        App::bind(ProjectDepartmentRepositoryInterface::class, ProjectDepartmentRepository::class);
        App::bind(ProjectAttachmentRepositoryInterface::class, ProjectAttachmentRepository::class);
        App::bind(ProjectRepositoryInterface::class, ProjectRepository::class);
        // project replies
        App::bind(ProjectReplyRepositoryInterface::class, ProjectReplyRepository::class);
        App::bind(ProjectReplyAttachmentRepositoryInterface::class, ProjectReplyAttachmentRepository::class);

        // ? ready projects
        App::bind(ReadyProjectRepositoryInterface::class, ReadyProjectRepository::class);
        App::bind(ReadyProjectDepartmentRepositoryInterface::class, ReadyProjectDepartmentRepository::class);

        // ? cart
        App::bind(CartRepositoryInterface::class, CartRepository::class);

        // ? qas
        App::bind(QasRepositoryInterface::class, QasRepository::class);
        App::bind(QasTypeRepositoryInterface::class, QasTypeRepository::class);

        // ? transactions
        App::bind(TransactionRepositoryInterface::class, TransactionRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
