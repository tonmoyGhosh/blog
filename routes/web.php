<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

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

// Blog Module Routes
Route::get('/',          [BlogController::class, 'index']);
Route::get('list/',      [BlogController::class, 'index']);
Route::get('create/',    [BlogController::class, 'create']);
Route::post('insert/',   [BlogController::class, 'insert']);
Route::get('edit/{id}',  [BlogController::class, 'edit']);
Route::post('update/',   [BlogController::class, 'update']);
Route::post('delete/',   [BlogController::class, 'delete']);




