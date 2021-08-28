<?php

namespace App\Providers;

use App\Events\UserRegistered;
use App\Listeners\SendWelcomeEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */

    // 5.7 <=
    // before you had to register all your events => listeners
    // into the Providers/EventServiceProvider


    /**
     * Register any events for your application.
     *
     * @return void
     */public function boot()
    {
        //
    }

    // 5.8 => Automatic Event Listener Discovery
    public function shouldDiscoverEvents()
    {
        return true;
    }
}
