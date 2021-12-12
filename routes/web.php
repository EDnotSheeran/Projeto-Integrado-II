<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\{
    HomeController,
    EventsController,
    UsersController,
    JobsController,
    HeadOfficeController
};

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/profile', [UsersController::class, 'profile'])->name('profile');
Route::post('/profile', [UsersController::class, 'updateProfile'])->name('profile');
Route::get('/profile/deletar', [UsersController::class, 'deleteProfile'])->name('profile.delete');
Route::get('/eventos/{id}/participar', [EventsController::class, 'participate'])->name('events.participate');
Route::get('/agenda', [UsersController::class, 'agenda'])->name('user.agenda');

Route::prefix('/eventos')->middleware('role:admin')->group(function () {
    Route::get('/', [EventsController::class, 'index'])->name('events');
    Route::get('/novo', [EventsController::class, 'new'])->name('events.store');
    Route::post('/novo', [EventsController::class, 'add'])->name('events.store');
    Route::get('/{id}', [EventsController::class, 'edit'])->name('events.update');
    Route::post('/{id}', [EventsController::class, 'update'])->name('events.update');
    Route::get('/{id}/deletar', [EventsController::class, 'delete'])->name('events.delete');
    Route::get('/{id}/presenca', [EventsController::class, 'attendance'])->name('events.attendance');
});

Route::prefix('/cargo')->middleware('role:admin')->group(function () {
    Route::get('/', [JobsController::class, 'index'])->name('jobs');
    Route::get('/novo', [JobsController::class, 'new'])->name('job.store');
    Route::post('/novo', [JobsController::class, 'add'])->name('job.store');
    Route::get('/{id}', [JobsController::class, 'edit'])->name('job.update');
    Route::post('/{id}', [JobsController::class, 'update'])->name('job.update');
    Route::get('/{id}/deletar', [JobsController::class, 'delete'])->name('job.delete');
});

Route::prefix('/sede')->middleware('role:admin')->group(function () {
    Route::get('/', [HeadOfficeController::class, 'index'])->name('headOffices');
    Route::get('/novo', [HeadOfficeController::class, 'new'])->name('headOffice.store');
    Route::post('/novo', [HeadOfficeController::class, 'add'])->name('headOffice.store');
    Route::get('/{id}', [HeadOfficeController::class, 'edit'])->name('headOffice.update');
    Route::get('/{id}/deletar', [HeadOfficeController::class, 'delete'])->name('headOffice.delete');
});

Route::prefix('/usuarios')->middleware('role:admin')->group(function () {
    Route::get('/', [UsersController::class, 'index'])->name('users');
    Route::get('/novo', [UsersController::class, 'new'])->name('user.store');
    Route::post('/novo', [UsersController::class, 'add'])->name('user.store');
    Route::get('/{id}', [UsersController::class, 'edit'])->name('user.update');
    Route::post('/{id}', [UsersController::class, 'update'])->name('user.update');
    Route::get('/{id}/deletar', [UsersController::class, 'delete'])->name('user.delete');
});
