<?php

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Livewire\Admin\ManageProject;
use Illuminate\Support\Facades\Route;
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

// });
});
