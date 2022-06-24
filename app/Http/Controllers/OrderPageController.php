<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Picture;

class OrderPageController extends Controller
{
  public function index(Order $order)
  {
    $pictures = Picture::where('order_id', $order->id)->paginate(9);
    return view('order.index', compact('pictures'));
  }
}
