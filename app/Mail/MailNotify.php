<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $OTP;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$OTP)
    {
        $this->name=$name;
        $this->OTP=$OTP;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Your OTP is ...")->view("emails.email");
    }
}
