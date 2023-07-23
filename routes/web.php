<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Localization
Route::group([
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::group(['middleware' => 'auth'], function () {
        Route::get('logout', fn () => view('home'))->name('logout');
        Route::get('myProjects', fn () => view('my-projects'))->name('myProjects');
        Route::get('/myProjects/{id}', fn ($id) => view('my-project-show')->with('id', $id))->name('myProjects.show');
        Route::get('/tickets', fn () => view('ticket'))->name('tickets');
        Route::get('/tickets/1', fn () => view('ticket-show'))->name('tickets.show');
        Route::get('profile', fn () => view('profile'))->name('myProfile');
        Route::get('letsStart', fn () => view('lets-start'))->name('letsStart');
    });

    Route::group(['middleware' => ['guest']], function () {
        Route::get('register', fn () => view('register'))->name('register');
        Route::get('login', fn () => view('login'))->name('login');
        Route::get('password/forget', fn () => view('forget-password'))->name('password.forget');
        Route::get('password/forget/{token}', fn ($token) => view('forget-password-form')->with('token', $token))->name('password.forget.form');
    });


    Route::get('/', fn () => view('home'))->name('index');
    Route::get('/faq', fn () => view('faq'))->name('faq');
    Route::get('/home', fn () => view('home'))->name('home');
    Route::get('/about', fn () => view('about'))->name('about');
    Route::get('store', fn () => view('store'))->name('store');
    Route::get('gallary', fn () => view('gallary'))->name('gallary');
    Route::get('project/{id}', fn ($id) => view('project', compact('id')))->name('project');
    // Route::get('project/{id}', fn ($id) => view('project', )->with('id', $id))->name('project');


    //? This route for any invalid request ;)
    // Route::any('{any}', function () {
    //     // dd(request()->getUri());
    //     return (new Response)->notFound(NULL, 'resource');
    // })->where('any', '.*');
});

