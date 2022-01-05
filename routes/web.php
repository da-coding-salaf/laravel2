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

Route::get('/', function () {
    return view('register');
})->name('registerpage');
Route::post('/register',[App\Http\Controllers\AuthController::class, 'register'])->name('register');
Route::get('/loginpage',[App\Http\Controllers\AuthController::class, 'loginpage'])->name('loginpage');
Route::post('/login',[App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/logout',[App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard',[App\Http\Controllers\AuthController::class, 'dashboard']);
