<?php

namespace App\Providers;

use App\Models\Theme;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Pagination\Paginator;
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
      Paginator::useBootstrapFive();

      View::composer([
        'main', 
        'includes.themesbar',
        'gallery.*', 
        'admin.*'], function ($view) {
        $themes = Cache::rememberForever('themes', function () {
          return Theme::all();         
        });        
        $view->with('themes', $themes);
      }); 
    }
}
