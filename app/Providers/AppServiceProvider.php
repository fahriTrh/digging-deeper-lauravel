<?php

namespace App\Providers;

use App\Events\EmailHasSent;
use App\Listeners\EmailHasSentNotif;
use Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(
            EmailHasSent::class,
            EmailHasSentNotif::class
        );
    }
}
