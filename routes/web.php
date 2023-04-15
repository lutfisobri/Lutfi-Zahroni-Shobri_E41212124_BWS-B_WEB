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

// Route::get('/', fn () => view('welcome'));
// Route::resource('user', 'ManagementUserController');
Route::get('/', fn () => view('week4.home'));
Route::get('/admin', fn () => view('week4.admin.home'));

Route::name('auth')->group(function() {
    Route::get('/login', fn () => view('week6.login'));
    Route::get('/register', fn () => view('week6.register'));
    Route::name('login')->post('/login', 'App\Http\Controllers\week6\Employe@login');
    Route::post('/register');
});

Route::prefix('/kerja')->group(function () {
    Route::get('/', 'App\Http\Controllers\week9\PengalamanKerja@index');
    Route::get('/create', 'App\Http\Controllers\week9\PengalamanKerja@create');
    Route::post('/store', 'App\Http\Controllers\week9\PengalamanKerja@store');
});

// Route::group(
//     Route::get('/login', fn () => view('week6.login')),
//     Route::get('/register', fn () => view('week6.register')),
//     Route::post('/login'),
//     Route::post('/register'),
// );