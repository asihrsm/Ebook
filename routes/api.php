<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');

Route::get('/book', [BookController::class, 'index']);
Route::post('/book', [BookController::class, 'store'])->middleware('auth:sanctum');
Route::get('/book/{id}', [BookController::class, 'show']);
Route::put('/book/{id}', [BookController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/book/{id}', [BookController::class, 'destroy'])->middleware('auth:sanctum');
// Route::resource('book', BookController::class)->except('edit', 'create');

// Route::get('/author', [AuthorController::class, 'index']);
// Route::post('/author', [AuthorController::class, 'store']);
// Route::get('/author/{id}', [AuthorController::class, 'show']);
// Route::put('/author/{id}', [AuthorController::class, 'update']);
// Route::delete('/author/{id}', [AuthorController::class, 'destroy']);
Route::resource('author', "\App\Http\Controllers\AuthorController")->except('edit', 'create')->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
