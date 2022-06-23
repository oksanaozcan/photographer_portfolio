<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PictureController;
use App\Http\Controllers\Admin\ThemeController;
use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\GalleryPageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [MainPageController::class, 'index'])->name('main');
Route::get('/gallery', [GalleryPageController::class, 'index'])->name('gallery.index');
Route::prefix('contacts')->group(function () {
  Route::get('/', [ContactPageController::class, 'index'])->name('contact.index');
  Route::post('/', [ContactPageController::class, 'store'])->name('contact.store');
  Route::get('/reload-captcha', [ContactPageController::class, 'reloadCaptcha'])->name('contact.reload.captcha');
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
      Route::get('/{order}/edit-single-order', [OrderController::class, 'editSingleOrder'])->name('admin.order.edit-single-order');
      Route::patch('/{order}', [OrderController::class, 'update'])->name('admin.order.update');      
      Route::patch('/{order}/update-single-order', [OrderController::class, 'updateSingleOrder'])->name('admin.order.update-single-order');      
      Route::delete('/{order}', [OrderController::class, 'delete'])->name('admin.order.delete');             
    });   

    Route::prefix('customer')->group(function () {
      Route::get('/', [CustomerController::class, 'index'])->name('admin.customer.index');
      Route::get('/create', [CustomerController::class, 'create'])->name('admin.customer.create');
      Route::get('/deleted', [CustomerController::class, 'indexDeleted'])->name('admin.customer.deleted'); 
      Route::post('/', [CustomerController::class, 'store'])->name('admin.customer.store');
      Route::get('/{customer}', [CustomerController::class, 'show'])->name('admin.customer.show');
      Route::get('/{customer}/edit', [CustomerController::class, 'edit'])->name('admin.customer.edit');
      Route::patch('/{customer}', [CustomerController::class, 'update'])->name('admin.customer.update');
      Route::delete('/{customer}', [CustomerController::class, 'delete'])->name('admin.customer.delete');             
    });   

    Route::prefix('picture')->group(function () {
      Route::get('/', [PictureController::class, 'index'])->name('admin.picture.index');
      Route::get('/create', [PictureController::class, 'create'])->name('admin.picture.create');
      Route::get('/deleted', [PictureController::class, 'indexDeleted'])->name('admin.picture.deleted'); 
      Route::post('/', [PictureController::class, 'store'])->name('admin.picture.store');
      Route::get('/{picture}', [PictureController::class, 'show'])->name('admin.picture.show');
      Route::get('/{picture}/edit', [PictureController::class, 'edit'])->name('admin.picture.edit');
      Route::patch('/{picture}', [PictureController::class, 'update'])->name('admin.picture.update');
      Route::delete('/{picture}', [PictureController::class, 'delete'])->name('admin.picture.delete');             
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

