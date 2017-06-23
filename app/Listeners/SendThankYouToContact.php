<?php

namespace App\Listeners;

use App\Events\ContactMade;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\ThankYouForContactingUs;
use Illuminate\Support\Facades\Mail;

class SendThankYouToContact
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
     * @param  ContactMade  $event
     * @return void
     */
    public function handle(ContactMade $event)
    {
        Mail::to($event->contact->email)->send(new ThankYouForContactingUs($event->contact));
    }
}
