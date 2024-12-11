<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SendSMSController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/send', [SendSMSController::class, 'sendSMS']) -> name('send.sms');


Route::middleware('auth')->group(function () {
    Route::get('/secret', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/secret-demi-final', [ProfileController::class, 'demiFinal'])->name('profile.demiFinal');
    Route::get('/secret-final', [ProfileController::class, 'final'])->name('profile.final');
});

require __DIR__.'/auth.php';
