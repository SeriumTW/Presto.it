<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RevisorMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user_contact;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_contact)
    {
        $this->user_contact = $user_contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@justDevs.com')->view('email.revisor');
    }
}
