<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\prodCompraController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/', function () {
    return view('home.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth',])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/inativo', function () {
        return view('inativo');
    });
});

Route::middleware(['auth','verificarUsuario'])->group(function () {
    Route::resources(['produto' => ProdutoController::class]);
    Route::resources(['cliente' => ClienteController::class]);
    Route::resources(['fornecedor' => FornecedorController::class]);
    Route::resources(['funcionario' => FuncionarioController::class]);
    Route::resources(['compra' => CompraController::class]);
    Route::resources(['prodCompra' => prodCompraController::class]);
});

require __DIR__.'/auth.php';
