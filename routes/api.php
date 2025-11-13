<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/hello', function (Request $request) {
    return response()->json(['message'=>"Hello,Api"]);
});
Route::get('/reservations', [ReservationController::class, 'index']);
Route::get('/reservations/{id}', [ReservationController::class, 'show']);
Route::post('/reservations', [ReservationController::class, 'store']);
Route::put('/reservations/{id}', [ReservationController::class,'update']);
Route::patch('/reservations/{id}', [ReservationController::class,'update']);
Route::delete('/reservations/{id}', [ReservationController::class,'destroy']);
