<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/usuarios/novo', [UsuariosController::class, 'index'])->name('index');
Route::get('/usuarios/novo/{id}', [UsuariosController::class, 'index'])->name('index2');
#ou 
#Route::get('/usuarios/novo','App\Http\Controllers\Usuarios@index');
Route::post('/usuarios/novo/rota', [UsuariosController::class, 'pegar_rota'])->name('pegar_rota');
Route::post('/usuarios/novo', [UsuariosController::class, 'salvar'])->name('salvar_usuario');
Route::get('/usuarios/novo/deletar/{id}', [UsuariosController::class, 'deletar'])->name('deletar_usuario');
Route::get('/usuarios/novo/editar/{id}', [UsuariosController::class, 'editar'])->name('editar_usuario');
Route::get('/usuarios/novo/valor/{arr}/{key}', [UsuariosController::class, 'v'])->name('v');
