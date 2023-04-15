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

/**
 * Route adalah sebuah alamat URL yang dapat diakses oleh pengguna
 * 
 * Example:
 * ```php
 * Route::get('/', function () {
 *    return view('welcome');
 * });
 * ```
 * Maka ketika pengguna mengakses alamat http://localhost:8000/ maka akan menampilkan view welcome
 * 
 * 
 * @see \Illuminate\Routing\Route
 */
function routes() {}

// Week 2
Route::prefix('/week2')->group(function () {
    // route untuk menampilkan Hello World
    Route::get('/', function () {
        return "Hello World";
    });

    // route untuk memanggil UserController
    Route::get('/user', 'App\Http\Controllers\week2\Week2Controller@index');

    // route untuk memanggil UserController dengan parameter
    Route::get('/user/{id}', 'App\Http\Controllers\week2\Week2Controller@show');

    // route untuk menampilkan halaman about
    Route::get('/about', fn () => view('week2.about'));

    // route resource untuk user
    Route::resource('/week3', 'App\Http\Controllers\week2\UserController');
});

// Week 3
Route::prefix('/week3')->group(function () {
    // route untuk menampilkan halaman home
    Route::get('/', fn () => view('week3.home'));

    // route untuk menampilkan halaman home dengan layout
    Route::get('/home', fn () => view('week3.views.home'));

    // route untuk menampilkan halaman about me
    Route::get('/about', 'App\Http\Controllers\week3\AboutController@index');
});