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

    // Auth
    Route::group(['middleware' => 'auth'], function () {
        Route::get('logout', fn () => view('home'))->name('logout');
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
    Route::get('/tickets', fn () => view('ticket'))->name('tickets');
    Route::get('/tickets/1', fn () => view('ticket-show'))->name('tickets.show');


    Route::get('store', fn () => view('store'))->name('store');
    Route::get('gallary', fn () => view('gallary'))->name('gallary');
    Route::get('myProfile', fn () => view('my-projects'))->name('myProfile');
    Route::get('letsStart', fn () => view('lets-start'))->name('letsStart');
    Route::get('myProjects', fn () => view('my-projects'))->name('myProjects');

});






Route::prefix('admin')->group(function () {

});

// Route::get('/home', Home::class);
// Route::get('/', Home::class)->name('index');
// Route::get('/home', Home::class)->name('home');
// Route::get('/about', About::class)->name('about');
