<?php
use App\Http\Livewire\Website\Home;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Localization
Route::group([
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function(){

        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
        Route::get('/', Home::class);

        Route::get('hi', function()
        {
            return __('messages.hello');
        });
});









Route::prefix('admin')->group(function () {

});



Route::get('/home', Home::class);
