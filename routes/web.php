<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ThemeController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\ThemePageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [MainPageController::class, 'index'])->name('main');
Route::get('/themes', [ThemePageController::class, 'index'])->name('theme.index');

Route::middleware(['auth'])->group(function () {
  Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');

    Route::prefix('theme')->group(function () {
      Route::get('/', [ThemeController::class, 'index'])->name('admin.theme.index');
      Route::get('/create', [ThemeController::class, 'create'])->name('admin.theme.create');
      Route::get('/deleted', [ThemeController::class, 'indexDeleted'])->name('admin.theme.deleted'); 
      Route::post('/', [ThemeController::class, 'store'])->name('admin.theme.store');
      Route::get('/{theme}', [ThemeController::class, 'show'])->name('admin.theme.show');
      Route::get('/{theme}/edit', [ThemeController::class, 'edit'])->name('admin.theme.edit');
      Route::patch('/{theme}', [ThemeController::class, 'update'])->name('admin.theme.update');
      Route::delete('/{theme}', [ThemeController::class, 'delete'])->name('admin.theme.delete');             
    });   
    
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

