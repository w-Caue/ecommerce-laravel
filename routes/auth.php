<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::middleware('guest:web')->group(function () {
    Volt::route('login', 'auth.login')
        ->name('login');

    Volt::route('register', 'auth.register')
        ->name('register');

});

Route::middleware('auth:web')->group(function () {
    
});

Route::post('logout', App\Livewire\Actions\Logout::class)
    ->name('logout');
