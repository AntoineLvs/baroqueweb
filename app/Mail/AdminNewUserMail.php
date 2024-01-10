<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminNewUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $input;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($input)
    {
        $this->input = $input;
    }

    /**
     * Build the message.
     */
    public function build(): static
    {
        return $this->subject('New User')->markdown('emails.admin.new-user');
    }
}
