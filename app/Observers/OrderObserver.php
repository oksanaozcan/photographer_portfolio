<?php

namespace App\Observers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

class OrderObserver
{
  public function created(Order $order)
  {
    //for create single order from admin
    $customer = Customer::find($order->customer->id);
    $customer->update([
      'orderable' => false,
    ]);

    //for create order & customer already status "complited" from admin
    if ($order->status === 'completed') {
      $customer = Customer::find($order->customer->id);
      $customer->update([
        'orderable' => true,
      ]);
    }
  }

  public function updated(Order $order)
  {    
    if ($order->status === 'completed') {
      $customer = Customer::find($order->customer->id);
      $customer->update([
        'orderable' => true,
      ]);
    }
  }
  
  public function deleted(Order $order)
  {
    if ($order->customer !== null) {
      Customer::find($order->customer->id)
      ->update([
        'orderable' => true,
      ]);
    }
        
  }
  
  public function restored(Order $order)
  {
      //
  }
  
  public function forceDeleted(Order $order)
  {
      //
  }
}
