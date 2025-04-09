<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ClienteController;
use App\Http\Controllers\API\SuscripcionController;
use App\Http\Controllers\API\PagoController;
use App\Http\Controllers\API\ContactoController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Client routes
Route::apiResource('clientes', ClienteController::class);

// Subscription routes
Route::apiResource('suscripciones', SuscripcionController::class);

// Payment routes
Route::apiResource('pagos', PagoController::class);

// Contact routes
Route::apiResource('contactos', ContactoController::class);
