<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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

Route::post('/login', [AuthController::class, 'auth']);



Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories', 'index')->middleware('ability:admin,moderator');
        Route::get('/categories/{id}', 'show')->middleware('ability:admin,moderator');
        Route::post('/categories', 'store')->middleware('ability:admin');
        Route::put('/categories/{id}', 'update')->middleware('ability:admin');
        Route::delete('/categories/{id}', 'destroy')->middleware('ability:admin');
    });
    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'index')->middleware('ability:admin,moderator');
        Route::get('/products/create', 'create')->middleware('ability:admin');
        Route::get('/products/{id}', 'show')->middleware('ability:admin,moderator');
        Route::post('/products', 'store')->middleware('ability:admin');
        Route::put('/products/{id}', 'update')->middleware('ability:admin');
        Route::delete('/products/{id}', 'destroy')->middleware('ability:admin');
    });
});
