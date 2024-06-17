<?php

namespace App\Http\Controllers;

use App\Models\ApiToken;
use App\Models\Invoice;
use App\Models\Tenant;
use App\Models\User;
use App\Scopes\TenantScope;
use Illuminate\View\View;
use Spatie\FlareClient\Api;

class ApiTokenController extends Controller
{
    protected $listeners = ['reportCreated' => 'generateReport'];

    public function index(): View
    {


        return view('api.index', []);
    }

    public function edit(ApiToken $api_token): View
    {

        return view('api.edit', compact('api_token'));
    }



    public function show($apiTokenId, $userId): View
    {
        $user = User::findOrFail($userId);
        $api_token = ApiToken::findOrFail($apiTokenId);

        return view('api.show', compact('user', 'api_token'));
    }

    public function apiDashboard(): View
    {

        $api_tokens = ApiToken::latest()->get();

        $users = User::whereNotIn('status', [0, 100, 99])->get();

        return view('api.api-dashboard', compact('api_tokens', 'users'));
    }

    public function destroy($api_token)
    {
        $api_token = ApiToken::findOrFail($api_token);

        $userId = $api_token->user_id;

        $api_token->delete();

        User::where('id', $userId)->update(['status' => 0]);

        return redirect()
            ->route('api.api-dashboard')
            ->with('message', 'Api Token was deleted successfully.');
    }

    // public function destroyInvoice($invoice, $api_token, $userId)
    // {
    //     if (is_string($api_token)) {
    //         $api_token = json_decode($api_token);
    //     }

    //     if (is_object($api_token) && property_exists($api_token, 'id')) {
    //         $apiTokenId = $api_token->id;
    //         $userId = $api_token->user_id;

    //         $invoice = Invoice::findOrFail($invoice);

    //         $invoice->delete();

    //         return redirect()
    //             ->route('api-token.user.show', ['apiTokenId' => $apiTokenId, 'userId' => $userId])
    //             ->with('message', 'Invoice was deleted successfully.');
    //     } else {
    //         return redirect()->back()->with('error', 'Invalid API Token data.');
    //     }
    // }


    public function generateReport($reportId)
    {
        app(DocumentController::class)->generateReport($reportId);
    }

    public function licenseManager(): View
    {
        $userId = auth()->id();

        $user = User::where('id', $userId)->first();

        return view('api.license-manager', compact('user'));
    }

    public function legalInformations(): View
    {
        return view('api.license-legal-informations');
    }
}
