<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleLoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('auth/google', [GoogleLoginController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleLoginController::class, 'handleGoogleCallback']);
