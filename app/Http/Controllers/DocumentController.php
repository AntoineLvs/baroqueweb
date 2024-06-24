<?php

namespace App\Http\Controllers;

use App\Models\ApiToken;
use App\Models\Document;
use App\Models\DocumentType;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Tenant;
use App\Models\TokenType;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class DocumentController extends Controller
{
    public function index(): View
    {
        $documents = Document::latest()->paginate(25);

        return view('documents.index', compact('documents'));
    }

    public function show($tenant, $filename): Response
    {
        //  $user =  User::findOrFail($user);

        $tenant = Tenant::findOrFail($tenant);

        // find the document from db

        //  $document = $user->documents()->where('filename', $filename)->get()->first();
        $document = $tenant->documents()->where('filename', $filename)->get()->first();

        // authorise user making request
        if (! (request()->user()->isAdmin() || request()->user()->isUser())) {
            abort(403);
        }
        // stream the file to the browser
        if ($document->extension == 'pdf') {
            return response(Storage::disk('s3')->get('/documents/'.$tenant->id.'/'.$filename))
                ->header('Content-Type', 'application/pdf');
        }
    }

    public function showPhoto($tenant, $filename): Response
    {
        $tenant = Tenant::findOrFail($tenant);

        // authorise user making request
        if (! (request()->user()->isAdmin() || request()->user()->isUser())) {
            abort(403);
        }

        return response()->make(Storage::disk('s3')->get('/photos/'.$tenant->id.'/'.$filename),
            200, ['Content-Type' => 'image/jpeg']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $document_types = DocumentType::all();

        return view('documents.create', compact('document_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document): View
    {
        $documents = Document::all();

        return view('documents.index', compact('documents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document): RedirectResponse
    {
        $document = $document;

        // check if the deleted product is inside any other asset
        if (Product::where('document_id', $document->id) != null) {
            $product = Product::where('document_id', $document->id)->get()->first();
            $product->document_id = null;
            $product->save();
        }

        // find the document from db
        //  $document = $user->documents()->where('filename', $filename)->get()->first();

        // authorise user making request
        if (! (request()->user()->isAdmin() || request()->user()->isUser())) {
            abort(403);
        } else {

            if (Auth::user()->id == $document->user_id) {
                Storage::disk('s3')->delete('/documents/'.Auth::user()->id.'/'.$document->filename);

            } else {
                Storage::disk('s3')->delete('/documents/'.$document->user_id.'/'.$document->filename);

            }
            $document->delete();
        }

        return redirect()
            ->route('documents.index')
            ->with('message', 'Document was deleted successfully.');

    }

    public function createInvoice($user)
    {
        $tenantId = $user->tenant_id;
        $user_name = $user->name;
        $apiToken = ApiToken::where('tenant_id', $tenantId)->first();

        $user_api_count = $user->api_calls_count;

        $tenant = Tenant::where('id', $tenantId)->first();
        $tokenType = TokenType::where('id', $apiToken->token_type_id)->first();

        $existingInvoicesCount = Invoice::where('user_id', $user->id)->count();

        // $user->invoice_number_prefix ??

        $invoice_number_prefix = strtoupper(substr($user->name, 0, 2)) . '-' . $user->id . '-' . (2400 + $existingInvoicesCount);
        $invoiceNumber = $invoice_number_prefix;

        $invoice = Invoice::create([
            'tenant_id' => $tenantId,
            'invoice_number' => $invoiceNumber,
            'invoice_number_prefix' => $invoice_number_prefix,
            'user_id' => $user->id,
            'api_call_count' => $user->api_calls_count ?? 0,
            'api_call_cost' => $tokenType->api_call_cost,
            'monthly_cost' => $tokenType->monthly_cost,
            'total_bill' => $tokenType->api_call_cost * (is_null($user->api_calls_count) ? 0 : $user->api_calls_count) + $tokenType->monthly_cost,
            'tax_rate' => $tokenType->tax_rate,
            'description' => "Description Here : blabla",
            'created_at' => now(),
            'status' => '1',
        ]);
        $user->update([
            'invoice_number_prefix' => $invoiceNumber,

        ]);

        return $invoice;
    }
}
