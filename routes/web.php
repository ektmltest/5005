<?php
use App\Http\Livewire\Website\About;
use App\Http\Livewire\Website\Home;
use App\Http\Livewire\Website\LetsStart;
use Illuminate\Support\Facades\Route;
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

    Route::get('letsStart', LetsStart::class)->name('letsStart');




});






Route::prefix('admin')->group(function () {

});

// Route::get('/home', Home::class);
// Route::get('/', Home::class)->name('index');
// Route::get('/home', Home::class)->name('home');
// Route::get('/about', About::class)->name('about');
