<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FreetrainingController;
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
        
        Route::put('/update/{slug}', [BlogController::class, 'update'])->name('update');
        Route::get('/ediblog/{slug}', [BlogController::class, 'ediblog'])->name('ediblog');
        Route::get('/destroy/{id}', [BlogController::class, 'destroy'])->name('destroy');
        Route::get('/show/{slug}', [BlogController::class, 'show'])->name('show');
        Route::get('/viewblog', [BlogController::class, 'viewblog'])->name('viewblog');
        Route::post('/store', [BlogController::class, 'store'])->name('store');
        Route::get('/addblog', [BlogController::class, 'addblog'])->name('addblog');
        Route::get('/viewfreetraining', [FreetrainingController::class, 'viewfreetraining'])->name('viewfreetraining');
        Route::get('/home', [AdminController::class, 'home'])->name('home');
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
