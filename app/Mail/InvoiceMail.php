<?php

namespace App\Mail;

use App\Models\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $invoice;
    public $pdfPath;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Invoice $invoice, $pdfPath)
    {
        $this->invoice = $invoice;
        $this->pdfPath = $pdfPath;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        Log::info('tiens (invoiceMail) :' . $this->invoice);

        return $this->subject('Ihre Rechnung - refuelOS')
            ->markdown('emails.invoices.invoice', [
                'invoice' => $this->invoice,
            ])
            ->attach($this->pdfPath, [
                'as' => 'invoice_' . $this->invoice->id . '.pdf',
                'mime' => 'application/pdf',
            ]);
    }
}
