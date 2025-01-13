<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/login', [HomeController::class, 'loginView'])->name('login');
Route::post('/', [AuthController::class, 'login'])->name('user.login');
Route::get('/register', [AuthController::class, 'registerView'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('user.register');

Route::middleware('auth')->group(function () {
  Route::get('/{id}', [HomeController::class, 'order'])->name('order');
  Route::post('/order', [OrderController::class, 'store'])->name('order.create');
  Route::get('/order/{id}', [OrderController::class, 'show'])->name('order.show');

  Route::post('/logout', [AuthController::class, 'logout']);
});