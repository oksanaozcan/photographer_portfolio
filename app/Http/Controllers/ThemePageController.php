<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemePageController extends Controller
{
  public function index()
  {
    return view('theme.index');
  }
}
