<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function () {
    Route::post('/registration', 'registration')->name('registration');
    Route::post('/profile', 'profile')->middleware('auth:sanctum')->name('profile');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->middleware('auth:sanctum')->name('logout');
});
