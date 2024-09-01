<?php

<<<<<<< HEAD
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\prodCompraController;
use App\Http\Controllers\FornecedorController;
=======
>>>>>>> parent of 352332a (Criação dos componentes Cliente e Fornecedor)
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resources(['produto' => ProdutoController::class]);
<<<<<<< HEAD
    Route::resources(['cliente' => ClienteController::class]);
    Route::resources(['fornecedor' => FornecedorController::class]);
    Route::resources(['compra' => CompraController::class]);
    Route::resources(['prodCompra' => prodCompraController::class]);

=======
>>>>>>> parent of 352332a (Criação dos componentes Cliente e Fornecedor)
});

require __DIR__.'/auth.php';
