<?php

use App\Http\Controllers\ApiMovieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentEmailController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SendNotifController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Login dan Register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');


Route::get('/', [MovieController::class, 'index'])->middleware('auth');

// Comments
Route::get('/history-comments/{id}', [CommentController::class, 'index']);
Route::post('/comment-store', [CommentController::class, 'store'])->middleware('auth');

// Only Admin
Route::group(['middleware' => ['auth', 'onlyadmin']], function() {
    Route::get('/dashboard-admin', [DashboardController::class, 'index']);
    Route::get('/dashboard-admin/{id}', [DashboardController::class, 'show']);
    Route::get('/dashboard-admin-users', [UserController::class, 'index']);
    Route::get('/dashboard-admin/users/destroy/{id}', [UserController::class, 'destroy']);
    Route::delete('/dashboard-admin/users/destroy/{id}', [UserController::class, 'destroy']);
    
    Route::get('/admin-create', [DashboardController::class, 'create']);
    Route::post('/admin-store', [DashboardController::class, 'store']);
    
    Route::get('/dashboard-admin/edit/{id}', [DashboardController::class, 'edit']);
    Route::put('/dashboard-admin/update/{id}', [DashboardController::class, 'update']);
    
    Route::get('/dashboard-admin/delete/{id}', [DashboardController::class, 'delete']);
    Route::delete('/dashboard-admin/destroy/{id}', [DashboardController::class, 'destroy']);
});


Route::get('/testing-notif', [SendNotifController::class, 'SendNotif']);
Route::get('/send-email', [CommentEmailController::class, 'sendEmail'])->middleware('auth');