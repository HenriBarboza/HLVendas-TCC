<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\prodCompraController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AutorizacaoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/', function () {
    return view('home.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/inativo', function () {
        return view('inativo');
    });
});

Route::middleware(['verificarGerente'])->group(function () {
    Route::get('/venda/{id}/editar', 'VendaController@edit')->name('venda.edit');
    Route::get('/compra/{id}/editar', 'CompraController@edit')->name('compra.edit');
    // Outras rotas protegidas pela Middleware
});

Route::middleware(['auth','verificarUsuario','verificarGerente'])->group(function () {
    Route::resources(['produto' => ProdutoController::class]);
    Route::resources(['cliente' => ClienteController::class]);
    Route::resources(['fornecedor' => FornecedorController::class]);
    Route::resources(['funcionario' => FuncionarioController::class]);
    Route::resources(['compra' => CompraController::class]);
    Route::resources(['venda' => VendaController::class]);
    Route::resources(['prodCompra' => prodCompraController::class]);
    Route::resources(['conta' => ContaController::class]);
    Route::resources(['pagamento' => PagamentoController::class]);
    Route::get('/verificacao/auth', [AutorizacaoController::class, 'auth'])->name('verificacao.auth');
    Route::post('/verificacao/confirmar', [AutorizacaoController::class, 'confirmarAuth'])->name('verificacao.confirmar');
});

require __DIR__.'/auth.php';

// As middlewares puxam as informações do aquivo bootstrap\app.php