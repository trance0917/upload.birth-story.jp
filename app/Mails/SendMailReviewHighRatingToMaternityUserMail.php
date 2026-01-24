<?php

namespace App\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailReviewHighRatingToMaternityUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mst_maternity_user;
    public $tbl_patient;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\App\Models\MstMaternityUser $mst_maternity_user,\App\Models\TblPatient $tbl_patient)
    {
        $this->mst_maternity_user = $mst_maternity_user;
        $this->tbl_patient = $tbl_patient;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->to($this->mst_maternity_user->email);

        $this->subject('お客様から評価をいただきました');
        $this->from(config('mail.from.address'),config('app.name'));
        $this->text('emails.send-mail-review-high-rating-to-maternity-user');
        $this->callbacks[] = function($message) {
            event(new \App\Events\SendMailLogEvent($this));
        };
        return $this;


    }
}
