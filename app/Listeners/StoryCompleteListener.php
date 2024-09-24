<?php

namespace App\Listeners;

use App\Events\StoryCompleteEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class StoryCompleteListener
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
     * @param  StoryCompleteEvent  $event
     * @return void
     */
    public function handle(StoryCompleteEvent $event)
    {
        Mail::send(new \App\Mails\StoryCompleteMail($event->tbl_patient));
    }
}
