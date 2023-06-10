<?php

use App\Helpers\Response;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProjectDepartmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [AuthController::class, 'register'])->name('api.register');
Route::post('/login', [AuthController::class, 'login'])->name('api.login');
// verification action
Route::get('/email/verify/{token}', [AuthController::class, 'verify'])->name('api.email.verify');

Route::middleware('auth:sanctum')->group(function () {
    // Auth
    Route::delete('/logout', [AuthController::class, 'logout'])->name('api.logout');

    //
    Route::get('/project/departments', [ProjectDepartmentController::class, 'index'])->name('api.project.department.index');
    Route::get('/project/departments/{id}', [ProjectDepartmentController::class, 'show'])->name('api.project.deparment.show');
});

//? This route for any invalid request ;)
Route::any('{any}', function () {
    // dd(request()->getUri());
    return (new Response)->notFound(NULL, 'resource');
})->where('any', '.*');
