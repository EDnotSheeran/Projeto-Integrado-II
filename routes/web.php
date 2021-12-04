<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\{
    HomeController,
    EventsController
};

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/eventos')->middleware('role:admin')->group(function () {
    Route::get('/', [EventsController::class, 'index'])->name('eventos');
    Route::get('/novo', [EventsController::class, 'new'])->name('eventos.novo');
    Route::post('/novo', [EventsController::class, 'add'])->name('eventos.novo');
    Route::get('/{id}/editar', [EventsController::class, 'edit'])->name('eventos.editar');
    Route::post('/{id}/editar', [EventsController::class, 'update'])->name('eventos.editar');
    Route::post('/deletar', [EventsController::class, 'delete'])->name('eventos.deletar');
});

Route::prefix('/usuarios')->middleware('role:admin')->group(function () {
    Route::get('/', [UsersController::class, 'index'])->name('usuarios');
    Route::get('/{id}/editar', [UsersController::class, 'edit'])->name('usuarios.editar');
    Route::post('/{id}/editar', [UsersController::class, 'update'])->name('usuarios.editar');
    Route::get('/novo', [UsersController::class, 'new'])->name('usuarios.novo');
    Route::post('/novo', [UsersController::class, 'add'])->name('usuarios.novo');
    Route::post('/deletar', [UsersController::class, 'delete'])->name('usuarios.deletar');
});
