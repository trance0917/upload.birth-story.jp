<?php

namespace App\Listeners;

use App\Events\LineErrorSendEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class LineErrorListener
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
     * @param  LineErrorSendEvent  $event
     * @return void
     */
    public function handle(LineErrorSendEvent $event)
    {
        Mail::send(new \App\Mails\LineErrorMail($event->log_line_message));
    }
}
