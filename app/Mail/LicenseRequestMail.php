<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LicenseRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $sepamandate;
    public $user;
    public $tokenType;

    public function __construct(User $user, $sepamandate, $tokenType)
    {
        $this->sepamandate = $sepamandate;
        $this->tokenType = $tokenType;
        $this->user = $user;

    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.license.LicenseRequestMail')
            ->with([
                'user' => $this->user,
                'sepamandate' => $this->sepamandate,
                'tokenType' => $this->tokenType
            ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Ihre Lizenz wartet auf Freischaltung',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.license.LicenseRequestMail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
