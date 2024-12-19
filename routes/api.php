<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KollekcioController;
use App\Http\Controllers\ReceptekController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('recepteks')->group(function () {
    Route::get('/', [ReceptekController::class, 'index']);
    Route::get('/{id}', [ReceptekController::class, 'show']);
    Route::post('/', [ReceptekController::class, 'store']);
    Route::put('/{id}', [ReceptekController::class, 'update']);
    Route::delete('/{id}', [ReceptekController::class, 'destroy']);
});

Route::prefix('kollekcios')->group(function () {
    Route::get('/', [KollekcioController::class, 'index']);
    Route::get('/{id}', [KollekcioController::class, 'show']);
    Route::post('/', [KollekcioController::class, 'store']);
    Route::put('/{id}', [KollekcioController::class, 'update']);
    Route::delete('/{id}', [KollekcioController::class, 'destroy']);
});