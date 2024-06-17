<?php

namespace App\Jobs;

use App\Mail\CancelMail;
use App\Models\ApiToken;
use App\Models\Invoice;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MailCancelLicense implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userId;

    /**
     * Create a new job instance.
     *
     * @param int $userId
     * @return void
     */
    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info("UserId is :" . $this->userId);

        $user = User::findOrFail($this->userId);
        $this->sendMail($user);
    }

    private function sendMail(User $user)
    {
        if (empty($user->email)) {
            Log::warning("User " . $user->name . " does not have an email address");
            return;
        }
        Log::info("Mail sent to" . $user->email);
        Mail::to($user->email)->send(new CancelMail($user));
    }
}
