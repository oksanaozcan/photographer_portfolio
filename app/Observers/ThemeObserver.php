<?php

namespace App\Observers;

use App\Models\Theme;
use Illuminate\Support\Facades\Cache;

class ThemeObserver
{
  protected function clearCache() 
  {
    Cache::forget('themes');
  }

  public function created(Theme $theme)
  {
    $this->clearCache();
  }

  public function updated(Theme $theme)
  {
    $this->clearCache();
  }

  public function deleted(Theme $theme)
  {
    $this->clearCache();
  }

  public function restored(Theme $theme)
  {
    $this->clearCache();
  }

  public function forceDeleted(Theme $theme)
  {
    $this->clearCache();
  }
}
