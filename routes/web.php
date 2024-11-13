<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TaskController;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    //
});

Route::middleware('auth')->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard.index');

    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [PageController::class, 'register'])->name('pages.register');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

    Route::get('/login', [PageController::class, 'login'])->name('pages.login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
});
