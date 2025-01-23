<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\JobpostController;
use App\Http\Controllers\SubcriberController;

use App\Http\Controllers\MeetingController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\FreetrainingController;
use App\Http\Controllers\StudentController;
use App\Models\Jobpost;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('blog/viewblogs', [BlogController::class, 'viewblogapi']);
Route::get('blog/viewsingleblogdetails/{slug}', [BlogController::class, 'viewsingleblogdetailapi']);
Route::get('jobs/viewjobs', [JobpostController::class, 'viewjobsapi']);
Route::get('jobs/viewsinglejobdetails/{slug}', [JobpostController::class, 'viewsinglejobdetailapi']);

Route::getRoutes();
Route::get('/', [ApiController::class, 'index']);
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('createmeeting', [MeetingController::class, 'store']);
Route::post('createcontact', [ContactController::class, 'store']);
Route::post('createsubcription', [SubcriberController::class, 'store']);
Route::post('createstudent', [StudentController::class, 'createstudent']);
Route::post('freetrainings', [FreetrainingController::class, 'createsfreestraining']);

Route::group(['prefix' => 'auth'], function () {
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    Route::post('createblog', [BlogController::class, 'store']);
    Route::get('blogtables', [BlogController::class, 'index']);
    Route::get('viewsingleblog/{slug}', [BlogController::class, 'show']);
    // Route::put('editblog/{id}', [BlogController::class, 'update']);
    Route::put('/blogs/{id}', [BlogController::class, 'update']);
    Route::delete('deleteblog/{id}', [BlogController::class, 'destroy']);
    Route::post('createjobs', [JobpostController::class, 'store']);

    Route::get('viewjobpost', [JobpostController::class, 'index']);
    Route::get('viewsinglejobpost/{slug}', [JobpostController::class, 'show']);
    Route::put('jobposts/{id}', [JobpostController::class, 'update']);
    Route::delete('deletejob/{id}', [JobpostController::class, 'destroy']);

    //meeting
    Route::get('viewmeeting', [MeetingController::class, 'index']);
    Route::put('editmeeting/{id}', [MeetingController::class, 'update']);
    Route::get('deletemeeting/{id}', [MeetingController::class, 'destroy']);
});