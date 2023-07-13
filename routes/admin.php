<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\ManageProject;
use App\Http\Livewire\Admin\ProjectSections;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ReadyProjectController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


// Localization
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
],
function () {

// Route::group(['middleware' => 'auth'], function () {

    Route::prefix('admin')->group(function () {
        Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

        // Manage Projects
        Route::get('manageProjects', fn () => view('admin.projects.manage-project'))->name('staffProjects');
        Route::get('staffProjectSections', fn() => view('admin.projects.project-sections'))->name('staffProjectSections');
        Route::get('staffProjectCategories', fn() => view('admin.projects.project-categories'))->name('staffProjectCategories');

        // CATALOG MANAGMENT
        Route::get('readyProjects', fn() => view('admin.catalogs.readyProjects'))->name('readyProjects');
        Route::get('readyProjects/{id}/edit', fn($id) => view('admin.catalogs.readyProjects-edit', ['id' => $id]))->name('readyProjects.edit');
        Route::get('readyProjects/create', fn() => view('admin.catalogs.readyProjects-create'))->name('readyProjects.create');
        Route::get('readyProjects/categories', fn() => view('admin.catalogs.store-department'))->name('readyProjects.departments');
        Route::get('readyProjects/addons', fn() => view('admin.catalogs.addons'))->name('readyProjects.addons');

        // TICKET SYSTEM
        Route::get('tickets', fn() => view('admin.tickets.index'))->name('tickets.index');
        Route::get('tickets/types', fn() => view('admin.tickets.types'))->name('tickets.types');

        // USER
        Route::get('users', fn() => view('admin.users.manage'))->name('users.index');
    });


// });
});
