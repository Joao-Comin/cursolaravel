<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Models\Produto;

//Route::resource('/produtos', ProdutoController::class);
//Route::resource('/users', UserController::class);

//rota do site:
Route::get('/', [SiteController::class, 'index'])->name('site.index');
Route::get('/produto/{slug}', [SiteController::class, 'details'])->name('site.details');
Route::get('/categoria/{id}', [SiteController::class, 'categoria'])->name('site.categoria');

//rota do carrinho:
Route::get('/carrinho', [CarrinhoController::class, 'carrinhoLista'])->name('site.carrinho');
Route::post('/carrinho', [CarrinhoController::class, 'adicionaCarrinho'])->name('site.addcarrinho');
Route::post('/remover', [CarrinhoController::class, 'removeCarrinho'])->name('site.removeCarrinho');
Route::post('/atualizar', [CarrinhoController::class, 'atualizaCarrinho'])->name('site.atualizaCarrinho');
Route::get('/limpar', [CarrinhoController::class, 'limparCarrinho'])->name('site.limparCarrinho');

//rota de login:
Route::view('/login', 'login.form')->name('login.form');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::get('/register', [LoginController::class, 'create'])->name('login.create');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware(['auth', 'checkEmail']);
Route::get('/admin/produtos',[ProdutoController::class, 'index'])->name('admin.produtos');
Route::delete('/admin/produto/delete/{id}',[ProdutoController::class, 'destroy'])->name('admin.delete');
