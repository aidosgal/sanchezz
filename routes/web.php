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

Route::get('/', [UserController::class, '__invoke'])->name('home')->middleware('guest');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'authenticate']);

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'create']);

Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');
Route::post('/update', [UserController::class, 'update'])->name('profile.update')->middleware('auth');

Route::get('/dashboard', [HomeController::class, 'home'])->middleware('auth')->name('dashboard');

Route::get('/deposit', [BalanceController::class, 'deposit'])->name('deposit');
Route::post('/balance/update', [BalanceController::class, 'update'])->middleware('auth');
Route::get('/withdraw', [BalanceController::class, 'withdraw'])->name('withdraw')->middleware('auth');

