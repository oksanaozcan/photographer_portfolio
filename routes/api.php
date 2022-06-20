<?php

use App\Http\Resources\Admin\OrderResource;
use App\Http\Resources\Admin\PictureResource;
use App\Http\Resources\Admin\ThemeResource;
use App\Models\Order;
use App\Models\Picture;
use App\Models\Theme;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/admin/order-processing', function () {
  $processingOrders = Order::where('status', 'processing')
  ->orWhere('status', 'completed')
  ->get();
  return OrderResource::collection($processingOrders);
});

Route::get('/admin/themes-for-select', function () {
  $themesForSelect = Theme::all(['id', 'title']);
  return ThemeResource::collection($themesForSelect);
});

Route::get('/admin/picture-for-edit/{picture}', function($picture) {
  $editedPicture = Picture::find($picture); 
  return new PictureResource($editedPicture);
});
