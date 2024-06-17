<?php

namespace App\Livewire\Api;

use App\Http\Controllers\DocumentController;
use App\Mail\LicenseRequestAdminMail;
use App\Models\ApiToken;
use Livewire\Component;
use App\Models\Manufacturer;
use App\Models\Vehicle;
use App\Models\Engine;
use App\Models\Release;
use App\Models\Report;
use App\Models\TokenType;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Mail\LicenseRequestMail;
use App\Models\SepaMandate;
use App\Models\Tenant;
use App\Scopes\TenantScope;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LicenseManager extends Component
{

    public $toggleButton = true;
    public $hasToken = false;
    public $user;
    public $apiToken;
    public $tenantId;
    public $userStatus;
    public $tokenType;
    public $daysRemaining;

    public $token_type_1;
    public $token_type_2;

    public $iban;
    public $bic;
    public $country = 'DE';
    public $zipcode;
    public $company_name;
    public $bank_name;
    public $street;
    public $city;
    public $url_subsite;

    public $api_token_types;
    public $token_type;
    public $api_token;

    public $selectedLicense;
    public $selectedToken;

    public $toggleCheckedSepa;
    public $toggleCheckedLegal;
    public $toggleCheckedDisclaimer;

    public function mount()
    {
        $this->selectedLicense = 1;

        $this->checkUserToken();

        $this->updatedSelectedLicense();

        $this->api_token_types = TokenType::withoutGlobalScope(TenantScope::class)->get();
    }

    public function updatedSelectedLicense()
    {
        if ($this->selectedLicense) {
            $this->selectedToken = TokenType::withoutGlobalScope(TenantScope::class)
                ->where('id', $this->selectedLicense)
                ->first();
        }
    }

    public function submit()
    {

        $data = $this->validate([
            'iban' => 'required|string|max:100',
            'bic' => 'required|string|max:100',
            'country' => ['required', function ($attribute, $value, $fail) {
                if ($value === '-- Bitte ein Land wählen --') {
                    $fail("The {$attribute} is required and cannot be '-- Please select a Country --'");
                }
            }],
            'zipcode' => 'required',
            'selectedLicense' => 'required',
            'company_name' => 'required',
            'bank_name' => 'required',
            'street' => 'required',
            'city' => 'required',
            'toggleCheckedSepa' => 'required',
            'toggleCheckedLegal' => 'required',
            'toggleCheckedDisclaimer' => 'required',
        ]);

        $userId = Auth::id();
        $user = User::where('id', $userId)->first();
        $tenant = Tenant::where('id', $user->tenant_id)->first();
        $status = $data['selectedLicense'];

        $tokenType = TokenType::withoutGlobalScope(TenantScope::class)
        ->where('id', $status)
        ->first();

        if (!ApiToken::where('user_id', $userId)->exists()) {

            User::where('id', $userId)->update([
                'status' => $status,
                'license_requested_at' => now(),

            ]);

            if ($user->tenant_id) {
                $tenantId = $user->tenant_id;
            } else {
                $tenantId = null;
            }

            $sepaMandate = SepaMandate::where('user_id', $userId)->first();

            if ($sepaMandate) {
                $sepaMandate->update([
                    'tenant_id' => $tenantId,
                    'description' => "Sepa Mandates Description",
                    'creditor_informations' => "Sepa Mandates Creditor informations",
                    'mandate_reference' => "Sepa Mandates Reference",
                    'mandate_type' => 1,
                    'payer_name' => $data['company_name'],
                    'payer_address' => $data['street'] . ', ' . $data['city'] . ', ' . $data['zipcode']  . ', ' . $data['country'],
                    'payer_iban' => $data['iban'],
                    'payer_bic' => $data['bic'],
                    'payer_bank' => $data['bank_name'],
                    'payment_type' => "reccuring",
                    'grant_date' => now(),
                ]);
            } else {
                $sepaMandate = SepaMandate::create([
                    'user_id' => $userId,
                    'tenant_id' => $tenantId,
                    'description' => "Sepa Mandates Description",
                    'creditor_informations' => "Sepa Mandates Creditor informations",
                    'mandate_reference' => "Sepa Mandates Reference",
                    'mandate_type' => 1,
                    'payer_name' => $data['company_name'],
                    'payer_address' => $data['street'] . ', ' . $data['city'] . ', ' . $data['zipcode']  . ', ' . $data['country'],
                    'payer_iban' => $data['iban'],
                    'payer_bic' => $data['bic'],
                    'payer_bank' => $data['bank_name'],
                    'payment_type' => "mtl. wiederkehrend",
                    'grant_date' => now(),
                ]);
            }
            if ($tenant) {

                    // Konvertiere den Tenant-Namen in das gewünschte Format
                    $formattedName = $this->convertToSlug($tenant->name);

                    // Update den Tenant mit dem formatierten Namen
                    $tenant->update([
                        'url_subsite' => $formattedName,
                    ]);

            }

            Mail::to($user->email)->send(new LicenseRequestMail($user, $sepaMandate, $tokenType));
            Mail::to('info@xtl-freigaben.de')->send(new LicenseRequestAdminMail($user, $sepaMandate, $tokenType));
        }

        return redirect()
            ->route('api.license-manager')
            ->with('message', 'Ihre Lizenz wurde beantragt. Bitte warten Sie einen Moment, bis unser Team diese Freigeschaltet hat.');
    }

    // Ihre Funktion zur Umwandlung des Strings in Kleinbuchstaben und Bindestriche
    function convertToSlug($string): string
    {
        // Konvertiere den String zu Kleinbuchstaben
        $string = strtolower($string);

        // Ersetze Leerzeichen und andere nicht alphanumerische Zeichen durch Bindestriche
        $string = preg_replace('/[^a-z0-9]+/i', '-', $string);

        // Entferne führende und nachfolgende Bindestriche
        $string = trim($string, '-');

        return $string;
    }



    public function cancelLicense()
    {

        return redirect()
            ->route('api.license-manager')
            ->with('message', 'Your Request has been saved. Your License will end up on the following date: ' . $this->apiToken->expires_at);
    }


    public function checkUserToken()
    {
        if (Auth::check()) {
            $this->user = Auth::user();
            $this->tenantId = session('tenant_id');

            $this->apiToken = ApiToken::where('tenant_id', $this->tenantId)->first();

            if ($this->apiToken) {
                $this->userStatus = $this->apiToken->user->status;
                $this->tokenType = TokenType::withoutGlobalScopes()->find($this->apiToken->token_type_id);

                $currentDate = now();
                $expirationDate = Carbon::parse($this->apiToken->expires_at);

                if ($expirationDate->isPast()) {
                    $this->daysRemaining = 'Expired';
                } else {
                    $this->daysRemaining = $currentDate->diffInDays($expirationDate);
                }
            } else {
                $otherUserWithStatus = User::where('tenant_id', $this->tenantId)
                    ->where('status', '<>', 0)
                    ->first();

                $this->userStatus = $otherUserWithStatus ? $otherUserWithStatus->status : 0;
            }

            $this->hasToken = $this->apiToken ? true : false;
            $this->dispatch('has-token', ['apiToken' => $this->apiToken]);
        }
    }

    public function pasteData()
    {
        $user = Auth::user();
        $tenant = $user->Tenant;

       // ddd($tenant);
        $this->company_name = $tenant->name ?? 'Bitte geben Sie Informationen ein';
        $this->street = $tenant->street ?? 'Bitte geben Sie Informationen ein';
        $this->zipcode = $tenant->zip ?? 'Bitte geben Sie Informationen ein';
        $this->city = $tenant->city ?? 'Bitte geben Sie Informationen ein';
        $this->country = $tenant->country ?? 'DE';

    }

    public function render()
    {
        return view('livewire.api.license-manager', [
            'apiToken' => $this->apiToken,
            'userStatus' => $this->userStatus,

        ]);
    }
}
