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
use App\Http\Controllers\mylib;

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

<<<<<<< HEAD
//Teste
Route::get('/comprarLivro', function () {
    return view('livros/comprarLivro');
});
=======

Route::get('/cadastrarExibirlivros', [LivroController::class, 'cadastraExibirLivros']);

>>>>>>> 53d1cc8cd775916f391c678d6960c178b1da7c13
