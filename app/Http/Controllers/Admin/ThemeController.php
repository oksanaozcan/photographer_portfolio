<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Theme\StoreRequest;
use App\Http\Requests\Admin\Theme\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Theme;

class ThemeController extends Controller
{
  public function index()
  {
    return view('admin.theme.index');
  }

  public function create()
  {
    return view('admin.theme.create');
  }

  public function store(StoreRequest $request)
  {
    $data = $request->validated();
    Theme::firstOrCreate($data);
    return redirect()->route('admin.theme.index');
  }

  public function show(Theme $theme)
  {
    return view('admin.theme.show', compact('theme'));
  }

  public function edit(Theme $theme)
  {
    return view('admin.theme.edit', compact('theme'));
  }

  public function update(UpdateRequest $request, Theme $theme)
  {
    $data = $request->validated();
    $theme->update($data);
    return view('admin.theme.show', compact('theme'));
  }

  public function delete(Theme $theme)
  {
    $theme->delete();
    return redirect()->route('admin.theme.index');    
  }   
  
  public function indexDeleted()
  {
    $trashedThemes = Theme::onlyTrashed()->get();
    return view('admin.theme.deleted', compact('trashedThemes'));
  }
}
