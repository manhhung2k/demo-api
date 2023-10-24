<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Hotel
Route::get('/hotel',[HotelController::class,'index']);
Route::post('/hotel/create', [HotelController::class, 'store']);
Route::delete('/hotel/{id}', [HotelController::class, 'destroy']);
Route::get('/hotel/edit/{id}', [HotelController::class, 'show']);
Route::post('/hotel/update/{id}', [HotelController::class, 'update']);