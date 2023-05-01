<?php

use App\Http\Controllers\RepositoryController;
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
    return view('template');
})->name('home');


//Route::apiResource('/repos', RepositoryController::class);

Route::resource('/repos',RepositoryController::class)->only([
    'index'
]);



