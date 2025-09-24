<?php

use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProdutosController::class,'index'])->name('paginainicial');

Route::get('/login', [UsuariosController::class, 'login'])->name('usuarios.login');
Route::post('/logout', [UsuariosController::class, 'logout'])->name('usuarios.logout');

Route::post('/login', [UsuariosController::class, 'validarLogin'])->name('usuarios.validarlogin');


Route::get('/cadastro', [UsuariosController::class, 'create'])->name('usuarios.create');
Route::post('/cadastro', [UsuariosController::class, 'store'])->name('usuarios.store');

