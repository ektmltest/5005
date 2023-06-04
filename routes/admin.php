<?php

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
        Route::get('dashboard', function(){
            return view('Admin.dashboard');
        })->name('dashboard');
    });


    // Manage Projects
    Route::get('manageProjects', fn () => view('Admin.projects.manage-project'))->name('staffProjects');
    Route::get('staffProjectSections', fn() => view('Admin.projects.project-sections'))->name('staffProjectSections');
    Route::get('staffProjectCategories', fn() => view('Admin.projects.project-categories'))->name('staffProjectCategories');


    // CATALOG MANAGMENT
    Route::get('readyProjects', [ReadyProjectController::class, 'getReadyProjects'])->name('readyProjects');



// });
});
