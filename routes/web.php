<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\PageController;
use App\Livewire\Dashboard;
use App\Livewire\SetCalendar;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    Route::fallback(function () {
        return redirect()->route('dashboard');
    });

    Route::get('/calendar/{user}', CalendarController::class)->name('calendar');
});

Route::middleware('auth')->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('/set-calendar', SetCalendar::class)->name('dashboard.set_calendar');

    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [PageController::class, 'register'])->name('pages.register');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

    Route::get('/login', [PageController::class, 'login'])->name('pages.login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
});
