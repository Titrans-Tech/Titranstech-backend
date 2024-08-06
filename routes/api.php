<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\JobpostController;
use App\Http\Controllers\SubcriberController;

use App\Http\Controllers\MeetingController;
use App\Models\Jobpost;

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
Route::put('editblog/{id}', [BlogController::class, 'update']);
Route::delete('deleteblog/{id}', [BlogController::class, 'destroy']);

// Job

Route::post('createjobs', [JobpostController::class, 'store']);
Route::get('viewjobpost', [JobpostController::class, 'index']);
Route::put('editjobpost/{slug}', [JobpostController::class, 'update']);
Route::get('deletejobpost/{id}', [JobpostController::class, 'destroy']);

//meeting
Route::post('createmeeting', [MeetingController::class, 'store']);
Route::get('viewmeeting', [MeetingController::class, 'index']);
Route::put('editmeeting/{id}', [MeetingController::class, 'update']);
Route::get('deletemeeting/{id}', [MeetingController::class, 'destroy']);

//meeting
Route::post('createcontact', [ContactController::class, 'store']);
Route::post('createsub', [SubcriberController::class, 'store']);

