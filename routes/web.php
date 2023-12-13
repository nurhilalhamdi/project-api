<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [HomeController::class, 'home']);


Route::controller(UsersController::class)->group(function () {
    Route::get('/login', 'login');
    Route::post('/login', 'doLogin');
    Route::delete('/logout', 'doLogout');
});

Route::controller(UsersController::class)->group(function () {
    Route::get('/signup', 'signUp');
    Route::post('/signup', 'doSignUp');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'dashboard');
});
