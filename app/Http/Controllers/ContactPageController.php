<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Contact\StoreRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactPageController extends BaseController
{
  public function index()
  {
    return view('contact.index');
  }

  public function store(Request $request)
  {
    $existedCustomer = Customer::where('name', $request->input('name'))
    ->where('phone', $request->input('phone'))
    ->where('orderable', true)
    ->first();

    $noOrderableCustomer = Customer::where('name', $request->input('name'))
    ->where('phone', $request->input('phone'))
    ->where('orderable', false)
    ->first();

    if ($noOrderableCustomer !== null) {
      Alert::error("Ваша заявка не принята", 'Ранее вы уже оставляли заявку и не можете добавить новую, пока предыдущая не исполнена.');
    }    

    if ($existedCustomer === null) {

      $data = $request->validate([
        'name' => 'required|unique:customers|string|max:255',        
        'phone' => 'required|unique:customers|string|max:255',
        'email' => 'required|email|max:255',
        'location' => 'required|string|max:255',
        'description' => 'required|string|max:2000',
        'convenient_date' => 'required|date',
        'convenient_time' => 'nullable',
        'captcha' => 'required|captcha',
      ]);
      if ($data['captcha']) {
        unset($data['captcha']);
      }

      $res = $this->service->store($data);
    }

    if ($existedCustomer !== null) {     

      $data = $request->validate([
        'name' => 'required',        
        'phone' => 'required',
        'email' => 'required|email|max:255',
        'location' => 'required|string|max:255',
        'description' => 'required|string|max:2000',
        'convenient_date' => 'required|date',
        'convenient_time' => 'nullable',
        'captcha' => 'required|captcha',
      ]);     

      if ($data['captcha']) {
        unset($data['captcha']);
      }
  
      $res = $this->service->storeWithExistedCustomer($data, $existedCustomer);
    }      
    
    if ($res) {
      Alert::success('Ваша заявка успешно отправлена.', 'Скоро я свяжусь с вами.');   
      return redirect()->route('contact.index')->withStatus('Ваша заявка успешно отправлена. Скоро я свяжусь с вами.');
    }
  }    

  public function reloadCaptcha()
  {
    return response()->json(['captcha'=> captcha_img()]);
  }
}