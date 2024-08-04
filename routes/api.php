<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
// blog section
Route::post('createblog', [BlogController::class, 'store']);
Route::get('blogtables', [BlogController::class, 'index']);
Route::get('viewsingleblog/{slug}', [BlogController::class, 'show']);
Route::patch('editblog/{slug}', [BlogController::class, 'update']);
Route::post('deleteblog/{slug}', [BlogController::class, 'destroy']);
