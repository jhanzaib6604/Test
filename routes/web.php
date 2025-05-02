<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('register','register')->name('register');
Route::post('registersave',[UserController::class,'register']) ->name('registersave');
Route::view('login','login')->name('login');
Route::post('loginmatch',[UserController::class,'login']) ->name('loginmatch');
Route::get('logout',[UserController::class,'logout']) ->name('logout');


Route::view('create','add')->name('create');
Route::post('added',[ProductController::class,'store']) ->name('added');
Route::get('/', [ProductController::class,'index'])->name('welcome');
Route::get('show/{id}', [ProductController::class,'show'])->name('show');
Route::get('edit/{id}', [ProductController::class,'edit'])->name('edit');
Route::get('/update/{id}', [ProductController::class,'update'])->name('update');
Route::get('delete/{id}', [ProductController::class,'destroy'])->name('delete');
Route::post('/cart/add', [ProductController::class, 'addToCart'])->name('cart');









