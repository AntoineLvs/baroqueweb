<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserAddedNew extends Mailable
{
    use Queueable, SerializesModels;

    public $user;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {


        $this->user = $user;

    }
    /**
     * Build the message.
     */
    public function build(): static
    {
        return $this->subject('Nur noch 5 Schritte bis zur XTL-Freigabe!')->markdown('emails.user.added-new')
            ->with([
            'user' => $this->user,

        ]);
    }
}
