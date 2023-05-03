<?php

use App\Http\Controllers\PageController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [PageController::class, 'log'])->name('login');
Route::post('/log', [PageController::class, 'login'])->name('login.post');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/hobbies', [PageController::class, 'hobbies'])->name('hobbies');
