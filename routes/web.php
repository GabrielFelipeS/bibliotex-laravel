<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\UserController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\mylib;
use App\Http\Controllers\VendedorController;


Route::get('/', [UserController::class, 'index']);
Route::post('/', [UserController::class, 'index']);
Route::get('/usuario/cadastrar', [UserController::class, 'create']);
Route::post('/usuario', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/sugestoes/CadastrarEmail', [mylib::class, 'cadastrarEmail']);
Route::post('/enviar/sugestao', [mylib::class, 'cadastrarSugestao']);
Route::get('/sair', [UserController::class, 'sair'])->name('sair');

Route::get('/login', function () {
    return view('usuario/loginUsuario');
})->middleware('guest');

Route::any('usuario/login', function () {
    return view('usuario/loginUsuario');
})->middleware('guest');


Route::get('/cadastrarvendedor', function () {
    return view('Vendedor/cadastrarvendedor');
})->middleware('guest');


Route::get('/cadastrarExibirlivros', [LivroController::class, 'cadastrarExibirlivros']);
Route::get('/excluirLivro', [LivroController::class, 'delete']);
Route::get('/editarLivro', [LivroController::class, 'editar']);
Route::post('/CadastrarLivro', [LivroController::class, 'store']);
Route::post('/updateLivro', [LivroController::class, 'update']);

Route::get('/comprarLivro', [CompraController::class, 'exibirComprarLivro'])->name('comprar');
Route::post('/comprarLivro', [CompraController::class, 'store'])->middleware('auth');

Route::get('/exibirCompras', [CompraController::class, 'exibirCompras'])->middleware('auth');
Route::get('/apagarCompra/{id}', [CompraController::class, 'delete'])->middleware('auth');

Route::get('/editarVenda', [CompraController::class, 'exibirEditarVendas'])->middleware('auth');
Route::post('/editarVendaUp', [CompraController::class, 'update'])->middleware('auth');

Route::get('/cadastrarvendedor', [VendedorController::class, 'cadastrarvendedor']);
Route::get('/excluirvendedor', [VendedorController::class, 'delete']);
Route::post('/updatevendedor', [VendedorController::class, 'update'])->name('vendedor.update');;
Route::post('/cadastrarvendedor', [VendedorController::class, 'store'])->name('vendedor.store');
Route::get('/editarvendedor', [VendedorController::class, 'editar']);



/*Route::get('/teste/{id}', function () {
    return view('Compras/editarVenda');
});*/