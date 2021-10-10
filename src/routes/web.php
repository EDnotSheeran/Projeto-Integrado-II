<?php

use Illuminate\Support\Facades\Route;

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

Route::namespace('App\Http\Controllers\Blog')->group(function () {
    Route::get(uri: '/posts', action: 'PostController');
    Route::get(uri: '/admin/posts', action: 'PostController@new');
});


// Route::get('/', function () {
//     return view('welcome');
// });

Route::namespace('App\Http\Controllers\Site')->group(function () {
    Route::get(uri: '/', action: 'HomeController');
});

// Route::get('/', HomeController::class);



Route::get(uri: '/teste', action: 'App\Http\Controllers\TesteController');
