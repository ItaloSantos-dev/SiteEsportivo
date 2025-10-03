<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\VendaController;
use App\Models\Produto;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('paginainicial');


//carrinho
Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
Route::post('/removerdocarrinho/{id}', [CarrinhoController::class, 'removerDoCarrinho'])->name('carrinho.removerdocarrinho');
Route::post('/addaocarrinho/{id}', [CarrinhoController::class, 'addAoCarrinho'])->name('carrinho.addaocarrinho');
Route::post('/limparcarrinho', [CarrinhoController::class, 'limparCarrinho'])->name('carrinho.limparcarrinho');

//compras
Route::post('/confirmarvenda', [VendaController::class, 'store'])->name('vendas.store');
Route::get('/compras', [UsuariosController::class, 'verCompras'])->name('usuarios.compras');

//Login
Route::get('/login', [UsuariosController::class, 'login'])->name('usuarios.login');
Route::post('/logout', [UsuariosController::class, 'logout'])->name('usuarios.logout');
Route::post('/login', [UsuariosController::class, 'validarLogin'])->name('usuarios.validarlogin');


//cadastro
Route::get('/cadastro', [UsuariosController::class, 'create'])->name('usuarios.create');
Route::post('/cadastro', [UsuariosController::class, 'store'])->name('usuarios.store');

//Filtros
Route::get('/categorias', [ProdutosController::class, 'filtrocategorias'])->name('produtos.categorias');
Route::get('/marcas', [ProdutosController::class, 'filtromarcas'])->name('produtos.marcas');

//seções
Route::get('/esportes', [ProdutosController::class, 'esportes'])->name('produtos.secaoesporte');
