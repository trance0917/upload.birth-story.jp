<?php

namespace App\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LineErrorMail extends Mailable
{
    use Queueable, SerializesModels;

    public $log_line_message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($log_line_message)
    {
        $this->log_line_message = $log_line_message;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->to(config('birthstory.admin_address'));
//        $this->bcc([
//            ['name' => env('APP_NAME'),'email' => env('MAIL_CONTACT'),],
//            ['name' => env('APP_NAME'),'email' => env('MAIL_CONTACT_BCC_1'),],
//            ['name' => env('APP_NAME'),'email' => env('MAIL_CONTACT_BCC_2'),],
//        ]);
        $this->subject('['.env('APP_NAME').'] ' .'LINE送信の失敗通知'. env('MAIL_SUBJECT_TEXT'));
        $this->from(config('mail.from.address'),config('app.name'));
        $this->text('emails.line_error');
        $this->callbacks[] = function($message) {
            event(new \App\Events\SendMailLogEvent($this));
        };
        return $this;


    }
}
