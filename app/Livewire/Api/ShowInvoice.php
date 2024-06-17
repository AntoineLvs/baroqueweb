<?php

namespace App\Livewire\Api;

use App\Http\Controllers\ApiTokenController;
use App\Http\Controllers\DocumentController;
use App\Jobs\GenerateMonthlyInvoices;
use App\Jobs\GeneratePdfAndSendMail;
use App\Models\ApiToken;
use App\Models\Invoice;
use Livewire\Component;
use App\Models\Report;
use App\Models\Settings;
use App\Models\Tenant;
use App\Models\TokenType;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class ShowInvoice extends Component
{

    public $user;
    public $userId;

    public $api_token;
    public $tenantId;
    public $invoices;

    protected $listeners = ['createInvoice'];

    public function mount($api_token, $user)
    {
        $this->user = $user;

        $this->invoices = Invoice::where('user_id', $user->id)->get();
    }

    public function createInvoice($userId)
    {
        $user = User::find($userId);

        $documentController = new DocumentController();
        $invoice = $documentController->createInvoice($user);


        return redirect(request()->header('Referer'));
    }

    public function runJob()
    {
        GenerateMonthlyInvoices::dispatch();

        session()->flash('message', 'Job to generate monthly invoices has been dispatched.');
    }

    public function sendMail()
    {
        GeneratePdfAndSendMail::dispatch();

        session()->flash('message', 'Job to generate Mail has been dispatched.');
    }

    public function generateInvoice($id)
    {
        $invoice = Invoice::findOrFail($id);
        $fileName = 'invoice' . '-' . $invoice->invoice_number . '.pdf';

        $pdf = PDF::loadView('documents.invoice', compact('invoice'));
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, $fileName);
    }

    public function deleteInvoice($invoiceId, $apiToken, $userId)
    {
        // Appel de la fonction destroyInvoice de votre ApiTokenController
        $controller = new ApiTokenController();
        $controller->destroyInvoice($invoiceId, $apiToken, $userId);
    }

    public function render()
    {
        return view('livewire.api.show-invoice', [
            'invoices' => $this->invoices,
        ]);
    }
}
