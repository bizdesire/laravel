<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\BlogController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [App\Http\Controllers\Api\UserController::class,'register']);
Route::post('/login', 'App\Http\Controllers\Api\LoginController@login');
Route::post('/forgot-password', 'App\Http\Controllers\ForgotPasswordController@forgot')->name('api.common.forgot');
Route::post('/password/reset', 'App\Http\Controllers\ForgotPasswordController@reset')->name('password.reset');
 

/* 
| Protected routes
*/
Route::middleware('auth:sanctum')->group( function () {
    Route::post('passwordSettings', 'App\Http\Controllers\Api\LoginController@passwordSettings'); 
    Route::post('/user', 'App\Http\Controllers\Api\UserController@getUserDetails');  
});
