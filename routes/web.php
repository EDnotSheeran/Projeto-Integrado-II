<?php

use App\Http\Controllers\PaginaInicialController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Role;

Auth::routes();

Route::namespace(App\Http\Controllers::class)->group(function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::prefix('/eventos')->middleware('role:administrator')->group(function () {
        Route::get('/', 'EventoController')->name('eventos');
        Route::get('/novo', 'EventoController@new')->name('eventos.novo');
        Route::post('/novo', 'EventoController@add')->name('eventos.novo');
        Route::get('/{id}/editar', 'EventoController@edit')->name('eventos.editar');
        Route::post('/{id}/editar', 'EventoController@update')->name('eventos.editar');
        Route::post('/deletar', 'EventoController@delete')->name('eventos.deletar');
    });

    Route::prefix('/usuarios')->middleware('role:administrator')->group(function () {
        Route::get('/', 'UsuariosController@index')->name('usuarios');
        Route::get('/{id}/editar', 'UsuariosController@edit')->name('usuarios.editar');
        Route::post('/{id}/editar', 'UsuariosController@update')->name('usuarios.editar');
        Route::get('/novo', 'UsuariosController@new')->name('usuarios.novo');
        Route::post('/novo', 'UsuariosController@add')->name('usuarios.novo');
        Route::post('/deletar', 'UsuariosController@delete')->name('usuarios.deletar');
    });
});
