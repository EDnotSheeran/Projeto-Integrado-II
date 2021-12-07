<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\UsuariosController;

Auth::routes();

    Route::get('/', [HomeController::class,'index'])->name('home');
    
    Route::prefix('/eventos')->middleware('role:administrador')->group(function () {
        Route::get('/', [EventoController::class, 'index'])->name('eventos');
        Route::get('/novo', [EventoController::class, 'new'])->name('eventos.create');
        Route::post('/novo', [EventoController::class, 'add'])->name('eventos.store');
        Route::get('/{id}/editar', [EventoController::class, 'edit'])->name('eventos.edit');
        Route::post('/{id}/editar', [EventoController::class, 'update'])->name('eventos.update');
        Route::post('/deletar', [EventoController::class, 'delete'])->name('eventos.destroy');
    });

    Route::prefix('/usuarios')->middleware('role:administrador')->group(function () {
        Route::get('/', [UsuariosController::class, 'index'])->name('usuarios');
        Route::get('/{id}/editar', [UsuariosController::class, 'edit'])->name('usuarios.edit');
        Route::post('/{id}/editar', [UsuariosController::class, 'update'])->name('usuarios.update');
        Route::get('/novo', [UsuariosController::class, 'new'])->name('usuarios.create');
        Route::post('/novo', [UsuariosController::class, 'add'])->name('usuarios.store');
        Route::post('/deletar', [UsuariosController::class, 'delete'])->name('usuarios.destroy');
    });

    Route::prefix('/eventos')->middleware('role:comum')->group(function () {
        
    });

    Route::prefix('/usuarios')->middleware('role:comum')->group(function () {
        
    });

    Route::view('/error','403')->name('403');
   


