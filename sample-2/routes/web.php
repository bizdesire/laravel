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

Route::get('/login', 'App\Http\Controllers\LoginController@login')->name('login')->middleware('checkAuth');
Route::get('/register', 'App\Http\Controllers\LoginController@register')->name('register')->middleware('checkAuth');
Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');

 

Route::group(['middleware' => ['userAuth']], function(){
   Route::get('/', 'App\Http\Controllers\DashboardController@dashboard')->name('user.dashboard');
});

Route::group(['prefix' => 'admin','middleware' => ['adminAuth']], function(){
   Route::get('/', 'App\Http\Controllers\Admin\DashboardController@dashboard')->name('admin.dashboard');
});

Route::group(['prefix' => 'vendor','middleware' => ['vendorAuth']], function(){
   Route::get('/', 'App\Http\Controllers\Vendor\DashboardController@dashboard')->name('vendor.dashboard');
});