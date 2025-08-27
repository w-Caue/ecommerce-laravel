<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\UtilController;
use App\Livewire\App\AccountSettings;
use App\Livewire\App\Customer\Detail as CustomerDetail;
use App\Livewire\App\Dashboard;
use App\Livewire\App\Order\Detail as OrderDetail;
use App\Livewire\App\Order\Listing as OrderListing;
use App\Livewire\App\Product\Detail;
use App\Livewire\App\Product\Listing;
use App\Livewire\App\Pedidos;
use App\Livewire\Auth\Admin\Login;
use App\Livewire\Auth\Admin\Register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::middleware('guest:web')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', Login::class)->name('login');
});

Route::middleware(['auth:web'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/contas', AccountSettings::class)->name('contas');

    Route::prefix('/produtos')->name('produtos.')->group(function () {
        Route::get('/', Listing::class)->name('listagem');
        Route::get('/{product}', Detail::class)->name('detalhe');
    });

    Route::prefix('/pedidos')->name('pedidos.')->group(function () {
        Route::get('/', OrderListing::class)->name('listagem');
        Route::get('/{codigo}', OrderDetail::class)->name('detalhe');
    });

    Route::prefix('/cliente')->name('cliente.')->group(function () {
        // Route::get('/', OrderListing::class)->name('listagem');
        Route::get('/{codigo}', CustomerDetail::class)->name('detalhe');
    });

    Route::get('/pedido/{codigo}', [UtilController::class, 'print'])->name('impressao');

    Route::get('logout', function () {
        Auth::logout(false);
        session()->flush();

        return redirect()->route('admin.login');
    })->name('logout');
});

Route::get('logout', function () {
    Auth::logout(false);
    session()->flush();

    return redirect()->route('login');
})->name('logout');
