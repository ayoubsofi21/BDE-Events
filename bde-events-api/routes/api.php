<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\BookingApiController;
use App\Http\Controllers\Api\EventApiController;

Route::post('/register', [AuthApiController::class, 'register']);
Route::post('/login', [AuthApiController::class, 'login']);

Route::get('/events', [EventApiController::class, 'index']);
Route::get('/events/{event}', [EventApiController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthApiController::class, 'logout']);
    Route::get('/me', [AuthApiController::class, 'me']);
    // student
    Route::post('/events/{event}/book',[BookingApiController::class, 'book']);
    Route::get('/user/tickets',[BookingApiController::class, 'tickets']);
    Route::get('/user/reservations',[BookingApiController::class, 'reservations']);

    // admin 
    Route::middleware('isAdmin')->prefix('admin')->group(function () {
        Route::get('/events', [EventApiController::class, 'adminIndex']);
        Route::post('/events', [EventApiController::class, 'store']);
        Route::get('/events/{event}', [EventApiController::class, 'adminShow']);
        Route::put('/events/{event}', [EventApiController::class, 'update']);
        Route::delete('/events/{event}', [EventApiController::class, 'destroy']);
    });
});
