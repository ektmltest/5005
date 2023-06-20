<?php

use App\Helpers\Response;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\GalleryProject\GalleryProjectController;
use App\Http\Controllers\Api\Profile\ProfileController;
use App\Http\Controllers\Api\Project\ProjectCategoryController;
use App\Http\Controllers\Api\Project\ProjectController;
use App\Http\Controllers\Api\Project\ProjectDepartmentController;
use App\Http\Controllers\Api\Project\ProjectReplyController;
use App\Http\Controllers\Api\ReadyProject\ReadyProjectController;
use App\Http\Controllers\Api\ReadyProject\ReadyProjectDepartmentController;
use App\Http\Controllers\Api\Ticket\TicketController;
use App\Http\Controllers\Api\Ticket\TicketReplyController;
use App\Http\Controllers\Api\Ticket\TicketTypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [AuthController::class, 'register'])->name('api.register');
Route::post('/login', [AuthController::class, 'login'])->name('api.login');
// ? verification action
Route::get('/email/verify/{token}', [AuthController::class, 'verify'])->name('api.email.verify');

// ? project departments
Route::get('/projects/departments', [ProjectDepartmentController::class, 'index'])->name('api.projects.departments.index');
Route::get('/projects/departments/{id}', [ProjectDepartmentController::class, 'show'])->name('api.projects.deparments.show');

// ? project categories
Route::get('/projects/categories', [ProjectCategoryController::class, 'index'])->name('api.projects.categories.index');
Route::get('/projects/categories/{id}', [ProjectCategoryController::class, 'show'])->name('api.projects.categories.show');

// ? gallery projects
Route::get('/gallery', [GalleryProjectController::class, 'index'])->name('api.gallery.index');
Route::get('/gallery/{id}', [GalleryProjectController::class, 'show'])->name('api.gallery.show');

Route::prefix('public')->group(function () {
    // ? Ready projects
    Route::get('/store/projects', [ReadyProjectController::class, 'index'])->name('api.public.store.projects.index');
    Route::get('/store/projects/{id}', [ReadyProjectController::class, 'show'])->name('api.public.store.projects.show');
});

// ? Ready projects departments
Route::get('/store/departments', [ReadyProjectDepartmentController::class, 'index'])->name('api.store.departments.index');
Route::get('/store/departments/{id}', [ReadyProjectDepartmentController::class, 'show'])->name('api.store.departments.show');

Route::middleware('auth:sanctum')->group(function () {
    // ? Auth
    Route::delete('/logout', [AuthController::class, 'logout'])->name('api.logout');

    // ? Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('api.profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('api.profile.update');

    // ? my projects
    Route::get('/projects', [ProjectController::class, 'index'])->name('api.projects.index');
    Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('api.projects.show');
    Route::post('/projects', [ProjectController::class, 'store'])->name('api.projects.store');

    // ? project replies
    Route::get('/projects/{id}/replies', [ProjectReplyController::class, 'index'])->name('api.projects.replies.index');
    Route::post('/projects/{id}/replies', [ProjectReplyController::class, 'store'])->name('api.projects.replies.store');

    // ? Ready projects
    Route::get('/store/projects', [ReadyProjectController::class, 'index'])->name('api.store.projects.index');
    Route::get('/store/projects/{id}', [ReadyProjectController::class, 'show'])->name('api.store.projects.show');
    Route::get('/store/projects/like/{id}', [ReadyProjectController::class, 'like'])->name('api.store.projects.like');
    Route::post('/store/projects/{id}/rate', [ReadyProjectController::class, 'rate'])->name('api.store.projects.rate');

    // ? Ticket Types
    Route::get('/tickets/types', [TicketTypeController::class, 'index'])->name('api.tickets.types.index');

    // ? Tickets
    Route::get('/tickets', [TicketController::class, 'index'])->name('api.tickets.index');
    Route::post('/tickets', [TicketController::class, 'store'])->name('api.tickets.store');
    Route::get('/tickets/available', [TicketController::class, 'showAllAvailableTickets'])->name('api.tickets.available');
    Route::put('/tickets/available/{id}', [TicketController::class, 'closeAvailableTicket'])->name('api.tickets.available.close');
    Route::get('/tickets/closed', [TicketController::class, 'showAllClosedTickets'])->name('api.tickets.closed');
    Route::get('/tickets/{id}', [TicketController::class, 'show'])->name('api.tickets.show');
    // TODO: get allowed mimes

    // ? Ticket replies
    Route::get('/tickets/{id}/replies', [TicketReplyController::class, 'index'])->name('api.tickets.replies.index');
    Route::post('/tickets/{id}/replies', [TicketReplyController::class, 'store'])->name('api.tickets.replies.store');
});

//? This route for any invalid request ;)
Route::any('{any}', function () {
    // dd(request()->getUri());
    return (new Response)->notFound(NULL, 'resource');
})->where('any', '.*');
