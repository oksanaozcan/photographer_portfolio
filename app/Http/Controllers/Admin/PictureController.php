<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Picture\StoreRequest;
use App\Http\Requests\Admin\Picture\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Picture;

class PictureController extends Controller
{
  public function index()
  {
    return view('admin.picture.index');
  }

  public function create()
  {
    return view('admin.picture.create');
  }

  public function store(StoreRequest $request)
  {
    dd($request);
    $data = $request->validated();
    Picture::firstOrCreate($data);
    return redirect()->route('admin.picture.index');
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
    return redirect()->route('admin.picture.show', $picture->id);
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
