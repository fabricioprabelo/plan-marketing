<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BrandController;
use App\Http\Controllers\API\ProductController;

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

Route::prefix(API_VERSION)->group(function () {
    Route::get('/me', function (Request $request) {
        return $request->user();
    })
        ->name(API_NAME . 'me');

    Route::post('/token/create', [AuthController::class, 'token'])
        ->name(API_NAME . 'token');

    Route::get('/products', [ProductController::class, 'index'])
    ->name(API_NAME . 'products');

    Route::get('/brands', [BrandController::class, 'index'])
    ->name(API_NAME . 'brands');
})
    ->middleware('auth:sanctum')
    ->name(API_NAME);

Route::prefix(API_VERSION)->group(function () {
    Route::post('/login', [AuthController::class, 'login'])
    ->name(API_NAME . 'login');
})
    ->name(API_NAME);
