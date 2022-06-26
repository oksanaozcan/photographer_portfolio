<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Picture\StoreRequest;
use App\Http\Requests\Admin\Picture\UpdateRequest;
use App\Http\Resources\Admin\PictureResource;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Picture;
use App\Notifications\SendPicturesUploadedNotification;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{
  public function index()
  {
    $pictures = Picture::all();
    return view('admin.picture.index', compact('pictures'));
  }

  public function create()
  {
    return view('admin.picture.create');
  }

  public function store(StoreRequest $request)
  {    
    $data = $request->validated();    
    $pictures = $data['pictures'];

    foreach ($pictures as $picture) {
      $filePath = Storage::disk('public')->put('images', $picture);      
      
      Picture::create([
        'path' => $filePath,        
        'url' => url('/storage/' . $filePath),        
        'size' => $picture->getSize(),
        'description' => $data['description'],
        'theme_id' => $data['theme_id'],
        'order_id' => $data['order_id'],
      ]);
    }

    $order = Order::find($data['order_id']);
    $customer = $order->customer;
    
    $notifyData = [
      'body' => $customer->name,
      'text' => 'Pictures from your order ' . $order->description . ' uploaded.',
      'url' => url('/order/' . $order->id),
      'msg' => 'Thank you!',
    ];

    $customer->notify(new SendPicturesUploadedNotification($notifyData));

    return response()->json(["message" => "success"]);
  }

  public function show(Picture $picture)
  {
    return view('admin.picture.show', compact('picture'));
  }

  public function edit(Picture $picture)
  {
    return view('admin.picture.edit', compact('picture'));
  }

  public function update(UpdateRequest $request, Picture $picture)
  {
    $data = $request->validated();
    $picture->update($data);
    return response()->json(['message' => 'success']);   
  }

  public function delete(Picture $picture)
  {
    $picture->delete();
    return redirect()->route('admin.picture.index');    
  }   
  
  public function indexDeleted()
  {
    $trashedPictures = Picture::onlyTrashed()->get();
    return view('admin.picture.deleted', compact('trashedPictures'));
  }   
}
