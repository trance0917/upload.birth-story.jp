<?php

namespace App\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StoryCompleteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $tbl_patient;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\App\Models\TblPatient $tbl_patient)
    {
        $this->tbl_patient = $tbl_patient;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->to(config('mail.from.address'));

        $this->subject('[通知]：BIRTH STORY('.$this->tbl_patient->mst_maternity->name.')');
        $this->from(config('mail.from.address'),config('app.name'));
        $this->text('emails.story-complete');
        $this->callbacks[] = function($message) {
            event(new \App\Events\SendMailLogEvent($this));
        };
        return $this;


    }
}
