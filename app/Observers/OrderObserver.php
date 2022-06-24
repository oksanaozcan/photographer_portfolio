<?php

namespace App\Observers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

class OrderObserver
{
  public function created(Order $order)
  {
      //
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
      //
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
