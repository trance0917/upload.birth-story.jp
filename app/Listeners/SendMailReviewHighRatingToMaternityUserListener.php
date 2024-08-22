<?php

namespace App\Listeners;

use App\Events\SendMailReviewHighRatingToStoreUserEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailReviewHighRatingToMaternityUserListener
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
     * @param  SendMailReviewHighRatingToMaternityUserListener  $event
     * @return void
     */
    public function handle(SendMailReviewHighRatingToMaternityUserListener $event)
    {
        Mail::send(new \App\Mails\SendMailReviewHighRatingToMaternityUserListener($event->mst_maternity_user,$event->tbl_patient));
    }
}
