<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\ManageProject;
use App\Http\Livewire\Admin\ProjectSections;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ReadyProjectController;
use Barryvdh\TranslationManager\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


// Localization
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
],
function () {

Route::group(['middleware' => 'auth'], function () {

    Route::prefix('admin')->middleware(['admin'])->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('admin.home');
        Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

        // ? Manage Projects
        Route::middleware('check.permission:manage-projects')->get('projects', fn () => view('admin.projects.manage-project'))->name('staffProjects');
        Route::middleware('check.permission:manage-projects-sections')->get('projects/sections', fn() => view('admin.projects.project-sections'))->name('staffProjectSections');
        Route::middleware('check.permission:manage-projects-categories')->get('projects/categories', fn() => view('admin.projects.project-categories'))->name('staffProjectCategories');

        // ? CATALOG MANAGMENT
        Route::middleware('check.permission:manage-catalog-projects')->get('readyProjects', fn() => view('admin.catalogs.readyProjects'))->name('readyProjects');
        Route::middleware('check.permission:edit-catalog-projects')->get('readyProjects/{id}/edit', fn($id) => view('admin.catalogs.readyProjects-edit', ['id' => $id]))->name('readyProjects.edit');
        Route::middleware('check.permission:create-catalog-projects')->get('readyProjects/create', fn() => view('admin.catalogs.readyProjects-create'))->name('readyProjects.create');
        Route::middleware('check.permission:manage-catalog-projects-categories')->get('readyProjects/categories', fn() => view('admin.catalogs.store-department'))->name('readyProjects.departments');
        Route::middleware('check.permission:manage-catalog-addons')->get('readyProjects/addons', fn() => view('admin.catalogs.addons'))->name('readyProjects.addons');

        // ? TICKET SYSTEM
        Route::middleware('check.permission:manage-tickets')->get('tickets', fn() => view('admin.tickets.index'))->name('tickets.index');
        Route::middleware('check.permission:manage-tickets-types')->get('tickets/types', fn() => view('admin.tickets.types'))->name('tickets.types');

        // ? USER
        Route::middleware('check.permission:manage-users')->get('users', fn() => view('admin.users.manage'))->name('users.index');

        // ? RANK
        Route::middleware('check.permission:manage-ranks')->get('ranks', fn() => view('admin.ranks.manage'))->name('ranks.index');
        Route::middleware('check.permission:edit-ranks')->get('ranks/{id}/edit', fn($id) => view('admin.ranks.edit', ['id' => $id]))->name('ranks.edit');
        Route::middleware('check.permission:manage-rank-permissions')->get('ranks/{id}/permissions', fn($id) => view('admin.ranks.permissions', ['id' => $id]))->name('ranks.permissions');

        // ? GALLERY
        Route::middleware('check.permission:manage-gallery-types')->get('gallery/types', fn() => view('admin.gallery.types'))->name('gallery.types');
        Route::middleware('check.permission:manage-gallery')->get('gallery', fn() => view('admin.gallery.index'))->name('gallery.index');

        // ? QAS
        Route::middleware('check.permission:manage-qas-types')->get('qas/types', fn() => view('admin.qas.types'))->name('qas.types');
        Route::middleware('check.permission:manage-qas')->get('qas', fn() => view('admin.qas.index'))->name('qas.index');

        // ? questions
        Route::middleware('check.permission:manage-platforms')->get('platforms', fn() => view('admin.platforms.index'))->name('platforms.index');

        // ? transactions
        Route::middleware('check.permission:manage-charges')->get('charges', fn() => view('admin.transactions.charges'))->name('transactions.charges');
        Route::middleware('check.permission:manage-withdrawals')->get('withdrawals', fn() => view('admin.transactions.withdrawals'))->name('transactions.withdrawals');

        // ? news
        Route::middleware('check.permission:manage-posts')->get('posts', fn () => view('admin.posts.manage'))->name('posts.manage');
        Route::middleware('check.permission:create-posts')->get('posts/create', fn () => view('admin.posts.create'))->name('posts.create');
        Route::middleware('check.permission:edit-posts')->get('posts/{id}/edit', fn ($id) => view('admin.posts.edit', ['id' => $id]))->name('posts.edit');

        //? This route for any invalid request ;)
        Route::any('{any}', function () {
            // dd(request()->getUri());
            return view('admin.errors.not-found');
        })->where('any', '.*')->name('admin.errors.not-found');
    });


});
});
