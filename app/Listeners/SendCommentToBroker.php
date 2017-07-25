<?php

namespace App\Listeners;

use App\Events\ContactMade;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\BrokerContactInfo;

class SendCommentToBroker
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
        sleep(2);
        
        Mail::to(env('BROKER_GMAIL'))->send(new BrokerContactInfo($event->contact));
    }
}
