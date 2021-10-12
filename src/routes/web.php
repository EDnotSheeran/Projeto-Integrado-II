<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site;

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

Route::namespace(Blog::class)->group(function () {
    Route::view(uri: '/admin', view: 'admin.index');
});

Route::namespace(Site::class)->group(function () {
    Route::get(uri: '/', action: 'HomeController');
});
