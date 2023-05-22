<?php

use App\Http\Livewire\Auth\ForgetPassword;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Website\About;
use App\Http\Livewire\Website\Faq;
use App\Http\Livewire\Website\Home;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Website\Gallary;
use App\Http\Livewire\Website\LetsStart;
use App\Http\Livewire\Website\Ticket;
use App\Http\Livewire\Website\TicketShow;
use App\Http\Livewire\Website\MyProjects;
use App\Http\Livewire\Website\Profile;
use App\Http\Livewire\Website\Store;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Localization
Route::group([
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

    // Auth
    Route::get('register', fn () => view('register'))->name('register');
    Route::get('login', fn () => view('login'))->name('login');
    Route::get('logout', fn () => view('login'))->name('logout');


    Route::get('password/forget', fn () => view('forget-password'))->name('password.forget');

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
