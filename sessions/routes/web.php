<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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

//https://www.itsolutionstuff.com/post/laravel-custom-login-and-registration-exampleexample.html
//https://www.freecodecamp.org/news/laravel-5-7-tutorial-build-your-first-crud-app-with-laravel-and-mysql-15cbd06c6cef/
Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'save'])->name('register.post');

Route::get('/login', [RegisterController::class, 'login'])->name('login');
Route::post('/login', [RegisterController::class, 'log'])->name('login.post');

Route::get('/dashboard', [RegisterController::class, 'dash'])->name('dash')->middleware('auth');
Route::post('/logout', [RegisterController::class, 'logout_post'])->name('dash.post')->middleware('auth');
