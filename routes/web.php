<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EBookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RoleController;
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

Route::get('/', [HomeController::class, 'getHome']);
Route::get('/home', [HomeController::class, 'getHome']);


Route::prefix('auth')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('login', [AuthController::class, 'getLogin'])->name('get.login');
        Route::post('login', [AuthController::class, 'login'])->name('login');

        Route::get('register', [AuthController::class, 'getRegister'])->name('get.register');
        Route::post('register', [AuthController::class, 'register'])->name('register');
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('/profile', [AuthController::class, 'getProfile'])->name('get.profile');
        Route::post('/profile/update', [AuthController::class, 'update'])->name('update.profile');
    });

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('book/{id}', [EBookController::class, 'getBook'])->name('book.detail');

Route::middleware(['auth'])->group(function () {
    Route::prefix('rent')->group(function () {
        Route::get('cart', [OrderController::class, 'getCart'])->name('get.cart');
        Route::get('thankyou', [OrderController::class, 'getThankyou'])->name('order.thx');
        Route::get('submit', [OrderController::class, 'submit'])->name('order.submit');

        Route::get('delete/{id}', [OrderController::class, 'delete'])->name('order.delete');

        Route::get('{id}', [OrderController::class, 'rent'])->name('rent');
    });

    Route::prefix('account')->group(function () {
        Route::get('/', [AccountController::class, 'getManage'])->name('get.account.maintain');
        Route::get('/role/{id}', [AccountController::class, 'getUpdateRole'])->name('get.update.role');
        Route::post('/role/{id}', [RoleController::class, 'update'])->name('update.role');
    });
});
