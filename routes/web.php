<?php

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
});
