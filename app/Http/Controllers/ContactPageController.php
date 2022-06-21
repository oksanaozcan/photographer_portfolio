<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Contact\StoreRequest;

class ContactPageController extends BaseController
{
  public function index()
  {
    return view('contact.index');
  }

  public function store(StoreRequest $request)
  {
    $data = $request->validated();
    if ($data['captcha']) {
      unset($data['captcha']);
    }
    
    $res = $this->service->store($data);    

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