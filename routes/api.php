<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HotelController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Category
Route::get('/category', [CategoryController::class,'index']);
Route::post('/category/create', [CategoryController::class, 'store']);
Route::delete('/category/{id}', [CategoryController::class, 'destroy']);
Route::get('/category/edit/{id}', [CategoryController::class, 'show']);
Route::post('/category/update/{id}', [CategoryController::class, 'update']);

//Hotel
Route::get('/hotel',[HotelController::class,'index']);
Route::post('/hotel/create', [HotelController::class, 'store']);
Route::delete('/hotel/{id}', [HotelController::class, 'destroy']);
Route::get('/hotel/edit/{id}', [HotelController::class, 'show']);
Route::post('/hotel/update/{id}', [HotelController::class, 'update']);