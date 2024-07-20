<?php

use App\Http\Controllers\BalanceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return app(UserController::class);
})->name('home');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'authenticate']);
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'create']);
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::post('/update', [UserController::class, 'update']);

Route::get('/dashboard', [HomeController::class, 'home'])->middleware('auth')->name('dashboard');

Route::get('/deposit', [BalanceController::class, 'deposit'])->name('deposit');
Route::post('/balance/update', [BalanceController::class, 'update']);
Route::get('/withdraw', [BalanceController::class, 'withdraw'])->name('withdraw');
