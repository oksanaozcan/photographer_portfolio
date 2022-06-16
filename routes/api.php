<?php

use App\Http\Controllers\Admin\OrderController;
use App\Http\Resources\Admin\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/admin/order-processing', function () {
  $processingOrders = Order::where('status', 'processing')->get();
  return OrderResource::collection($processingOrders);
});
