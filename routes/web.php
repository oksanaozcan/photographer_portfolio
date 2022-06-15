<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ThemeController;
use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\ThemePageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [MainPageController::class, 'index'])->name('main');
Route::get('/themes', [ThemePageController::class, 'index'])->name('theme.index');
Route::prefix('contacts')->group(function () {
  Route::get('/', [ContactPageController::class, 'index'])->name('contact.index');
  Route::post('/', [ContactPageController::class, 'store'])->name('contact.store');
});

// Route::get('/test', function () {
//   $res = Order::find(2);
//   dd($res->pictures);
// });

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

    Route::prefix('order')->group(function () {
      Route::get('/', [OrderController::class, 'index'])->name('admin.order.index');
      Route::get('/create', [OrderController::class, 'create'])->name('admin.order.create');
      Route::get('/create-single-order', [OrderController::class, 'createSingleOrder'])->name('admin.order.create-single-order');
      Route::get('/deleted', [OrderController::class, 'indexDeleted'])->name('admin.order.deleted'); 
      Route::post('/', [OrderController::class, 'store'])->name('admin.order.store');
      Route::post('/store-single-order', [OrderController::class, 'storeSingleOrder'])->name('admin.order.store-single-order');
      Route::get('/{order}', [OrderController::class, 'show'])->name('admin.order.show');
      Route::get('/{order}/edit', [OrderController::class, 'edit'])->name('admin.order.edit');
      Route::patch('/{order}', [OrderController::class, 'update'])->name('admin.order.update');
      Route::delete('/{order}', [OrderController::class, 'delete'])->name('admin.order.delete');             
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

