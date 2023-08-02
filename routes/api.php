<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
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

        Route::post('/tokens/create', [AuthController::class, 'token'])
            ->name(API_NAME . 'token');
    })
    ->middleware('auth:sanctum')
    ->name(API_NAME);
