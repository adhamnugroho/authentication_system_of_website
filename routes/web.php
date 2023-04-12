<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MiscellaneousController;
use App\Http\Controllers\User\DashboardController as userDashboardController;
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
    return redirect()->route('userDashboard');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/postLogin', [AuthController::class, 'postLogin'])->name('postLogin');
    Route::get('/registration-account', [AuthController::class, 'register'])->name('registrationAccount');
    Route::post('/registration-account-store', [AuthController::class, 'registerStore'])->name('registrationAccountStore');
});


Route::middleware('auth')->group(function () {

    Route::middleware('isAdmin')->prefix('admin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'main'])->name('adminDashboard');

        Route::get('/error-not-found', [MiscellaneousController::class, 'erorr'])->name('adminErorr');
    });

    Route::middleware('isUser')->group(function () {

        Route::get('/dashboard', [userDashboardController::class, 'main'])->name('userDashboard');
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
