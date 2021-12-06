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
    Route::get('/', [EventsController::class, 'index'])->name('events');
    Route::get('/novo', [EventsController::class, 'new'])->name('events.store');
    Route::post('/novo', [EventsController::class, 'add'])->name('events.store');
    Route::get('/{id}', [EventsController::class, 'edit'])->name('events.update');
    Route::post('/{id}', [EventsController::class, 'update'])->name('events.update');
    Route::get('/{id}/deletar', [EventsController::class, 'delete'])->name('events.delete');
});

Route::prefix('/usuarios')->middleware('role:admin')->group(function () {
    Route::get('/', [UsersController::class, 'index'])->name('users');
    Route::get('/novo', [UsersController::class, 'new'])->name('user.store');
    Route::post('/novo', [UsersController::class, 'add'])->name('user.store');
    Route::get('/{id}', [UsersController::class, 'edit'])->name('user.update');
    Route::post('/{id}', [UsersController::class, 'update'])->name('user.update');
    Route::post('/deletar', [UsersController::class, 'delete'])->name('user.delete');
});
