<?php

namespace App\Providers;

use App\Models\Theme;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      View::composer(['main', 'admin.*'], function ($view) {
        $themes = Cache::rememberForever('themes', function () {
          return Theme::all();
          // return Theme::withCount('cultures')->get();
        });        
        $view->with('themes', $themes);
      }); 
    }
}
