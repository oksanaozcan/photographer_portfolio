<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\Order\StoreRequest;
use App\Http\Requests\Admin\Order\UpdateRequest;
use App\Models\Order;

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

  public function update(UpdateRequest $request, Order $order)
  {
    $data = $request->validated();
    $res = $this->service->update($data, $order);    

    if ($res) {
      return redirect()->route('admin.order.show', $order->id);
    }
  }

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
