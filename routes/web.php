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

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home.dashboard');
Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::get('/logout', \App\Http\Controllers\LogoutController::class);

// Chat
Route::get('/home/chats/{chat}', [\App\Http\Controllers\ChatsController::class, 'index'])->name('chat');
Route::post('/home/chats/{chat}/{user}', [\App\Http\Controllers\ChatsController::class, 'sendMessage'])->name('chat.sendMessage');
Route::get('/home/chats/{chat}/data', [\App\Http\Controllers\ChatsController::class, 'data'])->name('chat.data');

// User Profile/Settings
Route::get('/user/{id}', [\App\Http\Controllers\UserController::class, 'profile'])->name('user.profile');
Route::get('/edit/user/', [\App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::post('/edit/user/', [\App\Http\Controllers\UserController::class, 'update'])->name('user.update');

// User Change Password
Route::get('/edit/password/user/', [\App\Http\Controllers\UserController::class, 'passwordEdit'])->name('password.edit');
Route::post('/edit/password/user/', [\App\Http\Controllers\UserController::class, 'passwordUpdate'])->name('password.update');

// User Delete Account
Route::post('/user/{id}', [\App\Http\Controllers\UserController::class, 'delete'])->name('deleteuser');
