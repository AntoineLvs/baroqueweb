<?php

namespace App\Jobs;

use App\Mail\InvoiceMail;
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

class GeneratePdfAndSendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {




        try {
            $tenantIds = ApiToken::pluck('tenant_id')->unique();
            $users = User::whereIn('tenant_id', $tenantIds)->get();

            foreach ($users as $user) {
                $userId = $user->id;
                $invoice = Invoice::where('user_id', $userId)->latest()->first();

                $this->sendMail($invoice);
            }
            Log::info('Mail is successful');
        } catch (\Exception $e) {
            Log::error('Mail did not succeed: '  . $e->getMessage() . 'User id : ' . $userId);
        }
    }

    private function sendMail($invoice)
    {
        $pdf = Pdf::loadView('documents.invoice', compact('invoice'));
        Log::info('tiens :' . $invoice);

        // Envoi de l'e-mail avec le PDF attaché
        $userId = $invoice->user_id;
        $user = User::where('id', $userId)->first();

        $fileName = 'invoice_' . $invoice->id . '.pdf';
        $pdfPath = storage_path('app/' . $fileName);

        $pdf->save($pdfPath);

        Mail::to($user->email)->send(new InvoiceMail($invoice, $pdfPath));

        unlink($pdfPath);
    }
}
