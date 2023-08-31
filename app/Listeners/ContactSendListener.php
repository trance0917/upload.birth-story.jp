<?php

namespace App\Listeners;

use App\Events\ContactSendEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class ContactSendListener
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
     * @param  ContactSendEvent  $event
     * @return void
     */
    public function handle(ContactSendEvent $event)
    {
        Mail::send(new \App\Mails\ContactMail($event->contact));
    }
}
