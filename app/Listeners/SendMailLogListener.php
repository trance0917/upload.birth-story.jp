<?php

namespace App\Listeners;

use App\Events\SendMailLogEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendMailLogListener
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
    public function handle(SendMailLogEvent $event)
    {
        $data = null;
        $data['from'] = json_encode($event->mail->from);
        $data['to'] = json_encode($event->mail->to);
        $data['cc'] = json_encode($event->mail->cc);
        $data['bcc'] = json_encode($event->mail->bcc);
        $data['view'] = $event->mail->textView;
        $data['subject'] = $event->mail->subject;
        $data['message'] = view($event->mail->textView,$event->mail->buildViewData())->render();
        \App\Models\LogMail::create($data);
    }
}
