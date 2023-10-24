<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Category
Route::get('/category', [CategoryController::class,'index']);
Route::post('/category/create', [CategoryController::class, 'store']);
Route::delete('/category/{id}', [CategoryController::class, 'destroy']);
Route::get('/category/edit/{id}', [CategoryController::class, 'show']);
Route::post('/category/update/{id}', [CategoryController::class, 'update']);