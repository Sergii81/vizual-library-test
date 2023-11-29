<?php

use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {
    Route::post('/login', [LoginController::class, 'loginUser']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::controller(BookController::class)->prefix('books')->group(function () {
            Route::get('/', 'index');
            Route::post('/', 'create');
            Route::get('/{book}', 'show');
            Route::patch('/{book}', 'update');
            Route::delete('/delete/{book}', 'delete');
        });
    });
});
