<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Customer\StoreRequest;
use App\Http\Requests\Admin\Customer\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
  public function index()
  {
    $customers = Customer::all();
    return view('admin.customer.index', compact('customers'));
  }

  public function create()
  {
    return view('admin.customer.create');
  }

  public function store(StoreRequest $request)
  {
    $data = $request->validated();
    Customer::firstOrCreate($data);
    return redirect()->route('admin.customer.index');
  }

  public function show(Customer $customer)
  {
    return view('admin.customer.show', compact('customer'));
  }

  public function edit(Customer $customer)
  {
    return view('admin.customer.edit', compact('customer'));
  }

  public function update(UpdateRequest $request, Customer $customer)
  {
    $data = $request->validated();    
    unset($data['unique_customer_id']);

    $customer->update($data);
    return redirect()->route('admin.customer.show', $customer->id);
  }

  public function delete(Customer $customer)
  {
    $customer->delete();
    return redirect()->route('admin.customer.index');    
  }   
  
  public function indexDeleted()
  {
    $trashedCustomers = Customer::onlyTrashed()->get();
    return view('admin.customer.deleted', compact('trashedCustomers'));
  }
}
