<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::get('/test', function () {
    return "tere";
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
