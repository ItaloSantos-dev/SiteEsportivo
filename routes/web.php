<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('paginainicial');
Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');

Route::post('/addaocarrinho/{id}', [CarrinhoController::class, 'addAoCarrinho'])->name('carrinho.addaocarrinho');
Route::post('/limparcarrinho', [CarrinhoController::class, 'limparCarrinho'])->name('carrinho.limparcarrinho');



Route::get('/login', [UsuariosController::class, 'login'])->name('usuarios.login');
Route::post('/logout', [UsuariosController::class, 'logout'])->name('usuarios.logout');

Route::post('/login', [UsuariosController::class, 'validarLogin'])->name('usuarios.validarlogin');


Route::get('/cadastro', [UsuariosController::class, 'create'])->name('usuarios.create');
Route::post('/cadastro', [UsuariosController::class, 'store'])->name('usuarios.store');

