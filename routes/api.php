<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// get all data
Route::get('/', 'App\Http\Controllers\week12\ApiPendidikan@getAll');

// get data by id
Route::get('/{id}', 'App\Http\Controllers\week12\ApiPendidikan@get');

// insert data
Route::post('/', 'App\Http\Controllers\week12\ApiPendidikan@insert');

// update data
Route::put('/{id}', 'App\Http\Controllers\week12\ApiPendidikan@update');

// delete data
Route::delete('/{id}', 'App\Http\Controllers\week12\ApiPendidikan@delete');