<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/admin', function () {
    return view('admin');
})->name('admin.panel')->middleware('auth', 'admin');


Route::controller(ItemController::class)->group(function () {

    Route::get('/', 'index')->name('item.all');

    Route::get('/item/{id}', 'show')->name('item.show');

    Route::get('/item', 'create')->name('item.create')->middleware('auth', 'admin');

    Route::post('/item', 'store')->name('item.store')->middleware('auth', 'admin');
});


Route::controller(AuthController::class)->group(function () {

    Route::get('/register', 'showRegistrationForm')->name('auth.register.form')->middleware('auth', 'admin');

    Route::post('/register', 'registerUser')->name('register.user')->middleware('auth', 'admin');

    Route::get('/login', 'showLoginForm')->name('auth.login.form')->middleware('guest');

    Route::post('/login', 'loginUser')->name('login.user')->middleware('guest');

    Route::get('/logout', 'logoutUser')->name('logout.user')->middleware('auth');
});


Route::controller(CartController::class)->group(function () {

    Route::get('/cart', 'index')->name('cart.index');

    Route::post('/cart', 'store')->name('cart.store');

    Route::delete('/cart/{id}', 'destroy')->name('cart.destroy');

    Route::patch('/cart/{id}', 'update')->name('cart.update');
});

