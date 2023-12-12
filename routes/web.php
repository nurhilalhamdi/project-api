<?php

use App\Http\Controllers\UsersController;
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

Route::controller(UsersController::class)->group(function () {
    Route::get('/login', 'login');
    Route::post('/login', 'doLogin');
    Route::post('/logout', 'doLogout');
});

Route::controller(UsersController::class)->group(function () {
    Route::get('/signup', 'signUp');
    Route::post('/signup', 'doSignUp');
});
