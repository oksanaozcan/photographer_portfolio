<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;

class GalleryPageController extends Controller
{
  public function index()
  {
    $pictures = Picture::paginate(9);
    return view('gallery.index', compact('pictures'));
  }
}
