<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminNotificationMail extends Mailable
{
    use Queueable, SerializesModels;


    public $input;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($input, $subject)
    {
        $this->input = $input;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     */
    public function build(): static
    {
        return $this->subject($this->subject)->markdown('emails.admin.notification');
    }
}
