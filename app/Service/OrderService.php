<?php

namespace App\Service;

use App\Models\Customer;
use App\Models\Order;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class OrderService
{
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
      if (isset($data['location'])) {
        $customerData->put('location', $data['location']);
        unset($data['location']);
      }     

      $customerData = $customerData->toArray();
      $customer = Customer::firstOrCreate($customerData); 
      
      $data = Arr::add($data, 'customer_id', $customer->id);      
      Order::firstOrCreate($data);         

      DB::commit();

      return true;

    } catch (Exception $exception) {
      DB::rollBack();
      abort(500, $exception);
    }
  }

}
