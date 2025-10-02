<?php

use App\Livewire\Auth\Custorme\Login;
use App\Livewire\Auth\Custorme\Register;
use App\Livewire\Ecommerce\DetalheProduto;
use App\Livewire\Ecommerce\Finalizar;
use App\Livewire\Ecommerce\PerfilCliente;
use App\Livewire\Ecommerce\TodosProdutos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/carrinho', function () {
    return view('pages.ecommerce.carrinho');
})->name('carrinho');

Route::get('/cliente', function () {
    return view('pages.ecommerce.pessoa');
})->name('cliente');

Route::get('/pagamento', function () {
    return view('pages.ecommerce.pagamento');
})->name('pagamento');

Route::get('/pedido', function () {
    return view('pages.ecommerce.pedido');
})->name('pedido');


Route::middleware(['auth:customer'])->prefix('ecommerce')->name('ecommerce.')->group(function () {
    Route::get('/perfil', function () {
        return view('pages.ecommerce.conta-perfil');
    })->name('perfil');

    Route::get('/pedidos', function () {
        return view('pages.ecommerce.conta-pedidos');
    })->name('pedidos');

    Route::get('logout', function () {
        Auth::logout(false);
        session()->flush();

        return redirect()->route('login');
    })->name('logout');
});


// require __DIR__ . '/auth.php';

require __DIR__ . '/admin.php';
