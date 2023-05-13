<?php

use App\Http\Livewire\Website\About;
use App\Http\Livewire\Website\Home;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('admin')->group(function () {

});


Route::get('/', Home::class)->name('index');
Route::get('/home', Home::class)->name('home');
Route::get('/about', About::class)->name('about');
