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
use App\Http\Controllers\UsuarioController;
Route::get('/', [UsuarioController::class, 'index']);
Route::post('/', [UsuarioController::class, 'index']);
Route::get('/usuario/cadastrar', [UsuarioController::class, 'create']);
Route::post('/usuario', [UsuarioController::class, 'store']);
Route::post('/login', [UsuarioController::class, 'login'])->name('login');


Route::get('usuario/login', function () {
    return view('usuario/loginUsuario');
})->middleware('guest');


