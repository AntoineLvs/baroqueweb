<?php

namespace App\Mail;

use App\Models\ApiToken;
use App\Models\Invoice;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class CancelMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $api_token;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user,)
    {
        $this->user = $user;
        $tenant = Tenant::where('id', $user->tenant_id)->first();
        $this->api_token = ApiToken::where('tenant_id', $tenant->id)->first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Ihre Lizenz wurde gekündigt')
            ->markdown('emails.user.cancel-license')
            ->with([
                'user' => $this->user,
                'api_token' => $this->api_token,
            ]);
    }
}
