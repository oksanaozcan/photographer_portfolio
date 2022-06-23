<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
  public function index()
  {
    $randomPictures = Picture::all()->random(9);
    return view('index', compact('randomPictures'));
  }
}
