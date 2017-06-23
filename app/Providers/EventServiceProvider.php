<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\PersonApplied' => [
            'App\Listeners\SendThankYouEmail',
            'App\Listeners\SendHREmail',
        ],
        'App\Events\ContactMade' => [
            'App\Listeners\SendThankYouToContact',
            'App\Listeners\SendCommentToBroker',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
