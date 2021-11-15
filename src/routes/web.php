<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::namespace(App\Http\Controllers::class)->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/eventos', 'EventoController')->name('eventos');
    Route::get('/eventos/novo', 'EventoController@new')->name('eventos.novo');
    Route::post('/eventos/novo', 'EventoController@add')->name('eventos.novo');
    Route::get('/eventos/{id}/editar', 'EventoController@edit')->name('eventos.editar');
    Route::post('/eventos/{id}/editar', 'EventoController@update')->name('eventos.editar');
    Route::delete('/eventos/{id}/deletar', 'EventoController@delete')->name('eventos.deletar');
    // Route::get('/eventos/{event}', [App\Http\Controllers\EventController::class, 'show'])->name('eventos.show');
    // Route::get('/eventos/{event}/inscricao', [App\Http\Controllers\EventController::class, 'inscricao'])->name('eventos.inscricao');
    // Route::post('/eventos/{event}/inscricao', [App\Http\Controllers\EventController::class, 'store'])->name('eventos.store');
});
