<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', 'App\Http\Controllers\LoginController@login')->name('login');
Route::get('/register', 'App\Http\Controllers\LoginController@register')->name('register');
Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');
Route::group(['middleware' => ['auth']], function(){
   Route::get('/', 'App\Http\Controllers\DashboardController@dashboard')->name('dashboard');
});