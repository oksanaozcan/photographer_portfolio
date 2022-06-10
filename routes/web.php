<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\MainPageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [MainPageController::class, 'index'])->name('main');

Route::middleware(['auth'])->group(function () {
  Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');

  });
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', function () {
  return redirect('/admin');
});

Route::get('/register', function () {
  return redirect('/');
});

