<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ClienteController;
use App\Http\Controllers\API\SuscripcionController;
use App\Http\Controllers\API\PagoController;
use App\Http\Controllers\API\ContactoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordResetController;

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

// Rutas públicas
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rutas de recuperación de contraseña
Route::post('/forgot-password', [PasswordResetController::class, 'forgotPassword']);
Route::post('/reset-password', [PasswordResetController::class, 'resetPassword']);

// Rutas protegidas
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    Route::put('/profile', [AuthController::class, 'updateProfile']);
});
