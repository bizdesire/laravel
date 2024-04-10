<?php
use Laravel\Socialite\Facades\Socialite;
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
 
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 

 
Route::get('/login', [App\Http\Controllers\HomeController::class, 'login'])->name('home.login');

Route::get('/register', [App\Http\Controllers\HomeController::class, 'register'])->name('home.register');
Route::get('/{token}/register', [App\Http\Controllers\HomeController::class, 'register'])->name('home.refer.register');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('home.logout');
Route::get('/mycart', [App\Http\Controllers\HomeController::class, 'cart'])->name('home.mycart');
Route::get('/{id}/add-to-cart', [App\Http\Controllers\HomeController::class, 'addCart'])->name('home.addCart');  
Route::get('/{id}/cart-update/{type}', [App\Http\Controllers\HomeController::class, 'cartUpdate'])->name('home.cartUpdate');

Route::get('/cart-items', [App\Http\Controllers\HomeController::class, 'cartItems'])->name('home.cartItems'); 
Route::middleware(['middleware' => 'userAuth'])->group(function () { 
    Route::get('/checkout', [App\Http\Controllers\PaymentController::class, 'checkout'])->name('home.checkout'); 
    Route::post('/payment', [App\Http\Controllers\PaymentController::class, 'payment'])->name('home.payment'); 
});


Route::group(['prefix' => '/admin'], function () { 
    Route::get('login', [App\Http\Controllers\Admin\AdminController::class, 'login'])->name('admin.login');
    Route::middleware(['middleware' => 'adminAuth'])->group(function () {
			Route::get('/logout', [App\Http\Controllers\Admin\AdminController::class, 'logout'])->name('admin.logout');
			Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');
            Route::get('/product/listing', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.product.index'); 
            Route::get('/product/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('admin.product.create'); 
			Route::post('/product/create', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('admin.product.create'); 
			Route::get('/product/{id}/edit', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('admin.product.edit');
            Route::post('/product/{id}/edit', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('admin.product.edit');
            Route::delete('/product/{id}/delete', [App\Http\Controllers\Admin\ProductController::class, 'delete'])->name('admin.product.delete');
            Route::any('/product/ajax', [App\Http\Controllers\Admin\ProductController::class, 'ajax'])->name('admin.product.ajax');

            Route::get('/users/listing', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user.list'); 
            Route::any('/users/ajax', [App\Http\Controllers\Admin\UserController::class, 'ajax'])->name('admin.user.ajax'); 
    });
});



