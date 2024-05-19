<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::view('scanner', 'scanner')
    ->middleware(['auth', 'verified'])
    ->name('scanner');
Route::view('stats', 'stats')
    ->middleware(['auth', 'verified'])
    ->name('stats');
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::view('qr', 'qr')
    ->middleware(['auth', 'verified'])
    ->name('qr');
Volt::route('register', 'pages.auth.register')
    ->middleware(['auth', 'verified'])
    ->name('register');
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
Route::get('/manifest.json', function () {
    $manifestService = app(\App\Services\ManifestService::class);
    $manifest = $manifestService->generate();

    return response($manifest, 200)
        ->header('Content-Type', 'application/json');
});

require __DIR__ . '/auth.php';
