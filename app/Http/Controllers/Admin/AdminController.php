<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Picture;
use App\Models\Theme;

class AdminController extends Controller
{
  public function index()
  {
    $countTheme = Theme::all()->count();
    $countCustomer = Customer::all()->count();
    $countOrder = Order::all()->count();
    $countPicture = Picture::all()->count();
    return view('admin.index', compact('countTheme', 'countCustomer', 'countOrder', 'countPicture'));
  }
}
