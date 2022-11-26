<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiMovieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



// Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function(){

    Route::resource('movies', ApiMovieController::class);
    Route::get('/search', [ApiMovieController::class, 'search']);
    Route::post('/logout', [ApiAuthController::class, 'logout']);

});


// Public Routes
Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);




