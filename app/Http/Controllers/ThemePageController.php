<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Theme;
use Illuminate\Http\Request;

class ThemePageController extends Controller
{
  public function index(Theme $theme)
  {
    $pictures = Picture::where('theme_id', $theme->id)->paginate(9);
    return view('theme.index', compact('pictures'));
  }
}
