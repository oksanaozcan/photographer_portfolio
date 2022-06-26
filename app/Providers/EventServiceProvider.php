<?php

namespace App\Providers;

use App\Events\OrderCreated;
use App\Listeners\SendOrderCreatedNotification;
use App\Models\Order;
use App\Models\Theme;
use App\Observers\OrderObserver;
use App\Observers\ThemeObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
   
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    public function boot()
    {
      parent::boot();
      Theme::observe(ThemeObserver::class);
      Order::observe(OrderObserver::class);

      Event::listen(
        OrderCreated::class,
        [SendOrderCreatedNotification::class, 'handle']
      );
    }

    public function shouldDiscoverEvents()
    {
        return false;
    }
}
