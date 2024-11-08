<?php

use App\Http\Controllers\AuthController;
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
});


Route::controller(ItemController::class)->group(function () {

    Route::get('/', 'index')->name('item.all');

    Route::get('/item/{id}', 'show')->name('item.show');

    Route::get('/item', 'create')->name('item.create');

    Route::post('/item', 'store')->name('item.store');
});


Route::controller(AuthController::class)->group(function () {

    Route::get('/register', 'showRegistrationForm')->name('auth.register.form');

    Route::post('/register', 'registerUser')->name('register.user');

    Route::get('/login', 'showLoginForm')->name('auth.login.form');

    Route::post('/login', 'loginUser')->name('login.user');

    Route::get('/logout', 'logoutUser')->name('logout.user');
});
