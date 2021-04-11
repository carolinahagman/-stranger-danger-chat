<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});
Auth::routes();

//Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/{user}', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::get('/logout', \App\Http\Controllers\LogoutController::class);

// User Profile/Settings
Route::get('/user/{id}', [\App\Http\Controllers\UserController::class, 'profile'])->name('user.profile');
Route::get('/edit/user/', [\App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::post('/edit/user/', [\App\Http\Controllers\UserController::class, 'update'])->name('user.update');

// User Change Password
Route::get('/edit/password/user/', [\App\Http\Controllers\UserController::class, 'passwordEdit'])->name('password.edit');
Route::post('/edit/password/user/', [\App\Http\Controllers\UserController::class, 'passwordUpdate'])->name('password.update');

// User Delete Account
Route::post('/user/{id}', [\App\Http\Controllers\UserController::class, 'delete'])->name('deleteuser');
