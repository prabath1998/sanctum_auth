<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductsCOntroller;
use App\Models\Product;
use Illuminate\Http\Request;
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

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/products', [ProductsCOntroller::class, 'store']);
    Route::put('/products/{id}', [ProductsCOntroller::class, 'update']);
    Route::delete('/products/{id}', [ProductsCOntroller::class, 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});

// public routes
// Route::resource('products', ProductsCOntroller::class);

Route::get('/products', [ProductsCOntroller::class, 'index']);
Route::get('/products/{id}', [ProductsCOntroller::class, 'show']);
Route::get('/products/search/{name}', [ProductsCOntroller::class, 'search']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
