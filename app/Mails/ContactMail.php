<?php

namespace App\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\App\Models\TblContact $contact)
    {
        $this->contact = $contact;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->to($this->contact->mail,$this->contact->name.'さま');
        $this->bcc([
            ['name' => env('APP_NAME'),'email' => env('MAIL_CONTACT'),],
            ['name' => env('APP_NAME'),'email' => env('MAIL_CONTACT_BCC_1'),],
            ['name' => env('APP_NAME'),'email' => env('MAIL_CONTACT_BCC_2'),],
        ]);
        $this->subject(env('MAIL_SUBJECT_TEXT').'['.env('APP_NAME').'] お問い合わせ承りました');
        $this->from(env('MAIL_CONTACT'),env('APP_NAME'));
        $this->text('emails.general.contact');
        $this->callbacks[] = function($message) {
            event(new \App\Events\SendMailLogEvent($this));
        };
        return $this;


    }
}
