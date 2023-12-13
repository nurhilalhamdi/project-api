<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\onlyAuthMiddleware;
use App\Http\Middleware\onlyGuestMiddleware;
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


Route::group(['middleware' => 'guest'], function () {
    Route::get('/signup',  [UsersController::class, 'signUp'])->name('signup');
    Route::post('/signup', [UsersController::class, 'doSignUp'])->name('signup');
    Route::get('/login', [UsersController::class, 'login'])->name('login');
    Route::post('/login', [UsersController::class, 'doLogin'])->name('login');
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
    Route::post('/logout', [UsersController::class, 'doLogout'])->name('logout');
});
