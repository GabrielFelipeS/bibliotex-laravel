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

Route::get('/', [UserController::class, 'index']);
Route::post('/', [UserController::class, 'index']);
Route::get('/usuario/cadastrar', [UserController::class, 'create']);

Route::post('/usuario', [UserController::class, 'store']);

Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/sugestors/CadastrarEmail"', [mylib::class, 'cadastrarEmail']);
Route::get('/sair', [UserController::class, 'sair'])->name('sair');

Route::get('/login', function () {
    return view('usuario/loginUsuario');
})->middleware('guest');

Route::any('usuario/login', function () {
    return view('usuario/loginUsuario');
})->middleware('guest');


