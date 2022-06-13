<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\StoreRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends BaseController
{
  public function index()
  {
    $orders = Order::all();       
    return view('admin.order.index', compact('orders'));
  }

  public function create()
  {
    return view('admin.order.create');
  }

  public function store(StoreRequest $request)
  {
    $data = $request->validated();
    $res = $this->service->store($data);    

    if ($res) {
      return redirect()->route('admin.order.index');
    }
  }

  public function show(Order $order)
  {
    return view('admin.order.show', compact('order'));
  }

  public function edit(Order $order)
  {
    return view('admin.order.edit', compact('order'));
  }

  // public function update(UpdateRequest $request, Theme $theme)
  // {
  //   $data = $request->validated();
  //   $theme->update($data);
  //   return view('admin.theme.show', compact('theme'));
  // }

  public function delete(Order $order)
  {
    $order->delete();
    return redirect()->route('admin.order.index');    
  }   
  
  public function indexDeleted()
  {
    $trashedOrders = Order::onlyTrashed()->get();
    return view('admin.order.deleted', compact('trashedOrders'));
  }
}
