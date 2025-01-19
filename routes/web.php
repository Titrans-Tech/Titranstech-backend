<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FreetrainingController;
use App\Http\Controllers\SubcriberController;
use App\Http\Controllers\JobpostController;
use App\Http\Controllers\StudentController;

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

Route::prefix('admin')->name('admin.')->group(function(){
    
    Route::middleware(['guest:admin'])->group(function(){
        Route::view('/register', 'dashboard.admin.register')->name('register');
        Route::view('/login', 'dashboard.admin.login')->name('login');
        Route::post('/createadmin', [AdminController::class, 'createadmin'])->name('createadmin');
        Route::post('/loginadmin', [AdminController::class, 'loginadmin'])->name('loginadmin');
        
    });

    Route::middleware(['auth:admin'])->group(function(){
        
        Route::get('/sub/destroy/{id}', [SubcriberController::class, 'destroy'])->name('destroy');
        Route::get('/viewsubscribers', [SubcriberController::class, 'viewsubscribers'])->name('viewsubscribers');
        Route::get('/contact/destroy/{id}', [ContactController::class, 'destroy'])->name('destroy');
        Route::get('/viewcontacts', [ContactController::class, 'viewcontacts'])->name('viewcontacts');
        Route::get('/job/destroy/{id}', [JobpostController::class, 'destroy'])->name('destroy');
        Route::put('/job/update/{slug}', [JobpostController::class, 'update'])->name('update');
        Route::get('/editjob/{slug}', [JobpostController::class, 'editjob'])->name('editjob');
        Route::get('/viewjobs', [JobpostController::class, 'viewjobs'])->name('viewjobs');
        Route::get('/addjob', [JobpostController::class, 'addjob'])->name('addjob');
        Route::post('/job/store', [JobpostController::class, 'store'])->name('store');
        Route::get('/job/show/{slug}', [JobpostController::class, 'show'])->name('show');
        
        Route::put('/update/{slug}', [BlogController::class, 'update'])->name('update');
        Route::get('/ediblog/{slug}', [BlogController::class, 'ediblog'])->name('ediblog');
        Route::get('/destroy/{id}', [BlogController::class, 'destroy'])->name('destroy');
        Route::get('/show/{slug}', [BlogController::class, 'show'])->name('show');
        Route::get('/viewblog', [BlogController::class, 'viewblog'])->name('viewblog');
        Route::post('/store', [BlogController::class, 'store'])->name('store');
        Route::get('/addblog', [BlogController::class, 'addblog'])->name('addblog');
        Route::get('/viewfreetraining', [FreetrainingController::class, 'viewfreetraining'])->name('viewfreetraining');
        Route::get('/viewstudents', [StudentController::class, 'viewstudents'])->name('viewstudents');
        Route::get('/viewsinglestudent/{id}', [StudentController::class, 'viewsinglestudent'])->name('viewsinglestudent');
        Route::get('/deletestudent/{id}', [StudentController::class, 'deletestudent'])->name('deletestudent');
        
        Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
        Route::get('/home', [AdminController::class, 'home'])->name('home');
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
