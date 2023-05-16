<?php
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
    ], function(){

    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::get('/', Home::class)->name('index');
    Route::get('/home', Home::class)->name('home');
    Route::get('/about', About::class)->name('about');
    Route::get('/faq', Faq::class)->name('faq');
    Route::get('/tickets', Ticket::class)->name('tickets');
    Route::get('/tickets/1', TicketShow::class)->name('tickets.show');

    Route::get('letsStart', LetsStart::class)->name('letsStart');
    Route::get('gallary', Gallary::class)->name('gallary');
    Route::get('store', Store::class)->name('store');
    Route::get('myProjects', MyProjects::class)->name('myProjects');
    Route::get('myProfile', Profile::class)->name('myProfile');




});






Route::prefix('admin')->group(function () {

});

// Route::get('/home', Home::class);
// Route::get('/', Home::class)->name('index');
// Route::get('/home', Home::class)->name('home');
// Route::get('/about', About::class)->name('about');
