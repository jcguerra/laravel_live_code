<?php

use Illuminate\Support\Facades\Route;
use App\Modules\User\Controllers\LoginController;
use App\Modules\User\Controllers\LogoutController;
use App\Modules\User\Controllers\GetUsersController;
use App\Modules\User\Controllers\ShowUserController;
use App\Modules\User\Controllers\UpdateUserController;

# Guest routes
Route::middleware('guest')->post('login', LoginController::class)->name('login');

# Auth routes
Route::middleware('auth:sanctum', 'api')->group(function () {
    Route::post('logout', LogoutController::class)->name('logout');

    Route::get('users', GetUsersController::class)->name('users.list');
    Route::get('users/{user}', ShowUserController::class)->name('users.show');
    Route::put('users/{user}', UpdateUserController::class);
});