<?php

namespace App\Service;

use App\Models\Customer;
use App\Models\Order;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderService
{
  public function storeWithExistedCustomer($data, $existedCustomer)
  {
    try {
      DB::beginTransaction();

      $existedCustomer->update([
        'orderable' => false,
        'email' => $data['email']
      ]); 
      
      if (isset($data['name'])) {
        unset($data['name']);
      }      
      if (isset($data['phone'])) {
        unset($data['phone']);
      }   
      if (isset($data['email'])) {
        unset($data['email']);
      }

      $data = Arr::add($data, 'customer_id', $existedCustomer->id);      
      $order = Order::firstOrCreate($data);               

      DB::commit();

      return $order;

    } catch (Exception $exception) {
      DB::rollBack();
      abort(500, $exception);
    }
  }

  public function store($data)
  {
    try {
      DB::beginTransaction();

      $customerData = collect();

      if (isset($data['name'])) {
        $customerData->put('name', $data['name']);       
        unset($data['name']);
      }      
      if (isset($data['phone'])) {
        $customerData->put('phone', $data['phone']);
        unset($data['phone']);
      }   
      if (isset($data['email'])) {
        $customerData->put('email', $data['email']);
        unset($data['email']);
      }   
      
      $customerData = $customerData->toArray();
      $customer = Customer::firstOrCreate($customerData); 
      
      $data = Arr::add($data, 'customer_id', $customer->id);      
      $order = Order::firstOrCreate($data);         

      DB::commit();

      return $order;

    } catch (Exception $exception) {
      DB::rollBack();
      abort(500, $exception);
    }
  }

  public function update($data, Order $order)
  {
    try {
      DB::beginTransaction();

      $customerData = collect();

      if (isset($data['name'])) {
        $customerData->put('name', $data['name']);       
        unset($data['name']);
      }      
      if (isset($data['phone'])) {
        $customerData->put('phone', $data['phone']);
        unset($data['phone']);
      }   
      if (isset($data['email'])) {
        $customerData->put('email', $data['email']);
        unset($data['email']);
      }   

      if (isset($data['unique_customer_id'])) {
        unset($data['unique_customer_id']);
      }   
      
      $customerData = $customerData->toArray();
      
      $customer = Customer::find($order->customer->id)->update($customerData);      
     
      $order->update($data);      

      DB::commit();

      return true;

    } catch (Exception $exception) {
      DB::rollBack();
      abort(500, $exception);
    }    
  }

}