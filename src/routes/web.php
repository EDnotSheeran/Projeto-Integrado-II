<?php

use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaginaInicialController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::namespace(App\Http\Controllers::class)->group(function () {

    Route::get('/', [PaginaInicialController::class, 'index'])->name('list.eventos');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/eventos', 'EventoController')->name('eventos');
    Route::get('/eventos/novo', 'EventoController@new')->name('eventos.novo');
    Route::post('/eventos/novo', 'EventoController@add')->name('eventos.novo');
    Route::get('/eventos/{id}/editar', 'EventoController@edit')->name('eventos.editar');
    Route::post('/eventos/{id}/editar', 'EventoController@update')->name('eventos.editar');
    Route::post('/eventos/deletar', 'EventoController@delete')->name('eventos.deletar');
    //Route::view('/usuarios', 'usuarios.list');
    Route::get('/usuarios', 'UsuariosController@index')->name('usuarios');
    Route::get('/usuarios/{id}/editar', 'UsuariosController@edit')->name('usuarios.editar');
    Route::get('/usuarios/novo', 'UsuariosController@new')->name('usuarios.novo');
    Route::post('/usuarios/novo', 'UsuariosController@add')->name('usuarios.novo');
});
