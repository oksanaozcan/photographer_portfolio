<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\Order\StoreRequest;
use App\Http\Requests\Admin\Order\StoreSingleOrderRequest;
use App\Http\Requests\Admin\Order\UpdateRequest;
use App\Http\Requests\Admin\Order\UpdateSingleOrderRequest;
use App\Models\Customer;
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

  public function createSingleOrder()
  {
    $customers = Customer::all(['id', 'name', 'phone']);
    return view('admin.order.create-single-order', compact('customers'));
  }

  public function store(StoreRequest $request)
  {
    $data = $request->validated();
    $res = $this->service->store($data);    

    if ($res) {
      return redirect()->route('admin.order.index');
    }
  }

  public function storeSingleOrder(StoreSingleOrderRequest $request)
  {
    $data = $request->validated();
    Order::firstOrCreate($data);
    return redirect()->route('admin.order.index');    
  }

  public function show(Order $order)
  {
    return view('admin.order.show', compact('order'));
  }

  public function edit(Order $order)
  {
    return view('admin.order.edit', compact('order'));
  }

  public function editSingleOrder(Order $order)
  {
    $customers = Customer::all(['id', 'name', 'phone']);
    return view('admin.order.edit-single-order', compact('order', 'customers'));
  }

  public function update(UpdateRequest $request, Order $order)
  {
    $data = $request->validated();
    $res = $this->service->update($data, $order);    

    if ($res) {
      return redirect()->route('admin.order.show', $order->id);
    }
  }

  public function updateSingleOrder(UpdateSingleOrderRequest $request, Order $order)
  {
    $data = $request->validated();
    $order->update($data);
    return redirect()->route('admin.order.show', $order->id);
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
