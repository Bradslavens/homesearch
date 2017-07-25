<?php

namespace App\Listeners;

use App\Events\PersonApplied;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\ThankYouForApplying;
use Illuminate\Support\Facades\Mail;

class SendThankYouEmail
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
        Mail::to($event->applicant->email)->send(new ThankYouForApplying($event->applicant));
    }
}
