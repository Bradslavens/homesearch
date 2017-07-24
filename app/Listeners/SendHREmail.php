<?php

namespace App\Listeners;

use App\Events\PersonApplied;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\PersonAppliedHRMailer;

class SendHREmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PersonApplied  $event
     * @return void
     */
    public function handle(PersonApplied $event)
    {
        Mail::to(env('BROKER_GMAIL'))->send(new PersonAppliedHRMailer($event->applicant));
    }
}
