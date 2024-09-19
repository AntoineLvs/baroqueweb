<?php

namespace App\Livewire\Api;

use App\Http\Controllers\DocumentController;
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
use App\Models\Tenant;
use App\Scopes\TenantScope;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Illuminate\Http\Request;

class Index extends Component
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

    public $selectedLicense;
    public $iban;
    public $bic;
    public $country;
    public $zipcode;
    public $company_name;
    public $bank_name;
    public $street;
    public $city;
    public $url_subsite;

    public $api_token_types;




    public function mount()
    {
        $this->checkUserToken();

        $this->api_token_types = TokenType::withoutGlobalScope(TenantScope::class)->get();
        $this->token_type_1 = TokenType::withoutGlobalScope(TenantScope::class)->find(1);
        $this->token_type_2 = TokenType::withoutGlobalScope(TenantScope::class)->find(2);
        $this->tenantId = Auth::user()->tenant_id ?? null;
    }


    public function submit()
    {

        $data = $this->validate([
            'iban' => 'nullable|string|max:100',
            'bic' => 'nullable|string|max:100',
            'country' => 'nullable',
            'zipcode' => 'nullable',
            'selectedLicense' => 'nullable',
            'company_name' => 'nullable',
            'bank_name' => 'nullable',
            'street' => 'nullable',
            'city' => 'nullable',

        ]);

        $userId = Auth::id();
        $user = User::where('id', $userId)->first();
        $tenant = Tenant::where('id', $user->tenant_id)->first();
        $status = $data['selectedLicense'];

        if (!ApiToken::where('user_id', $userId)->exists()) {
            User::where('id', $userId)->update([
                'status' => $status,
                'license_requested_at' => now(),
                'iban' => $data['iban'],
                'bic' => $data['bic'],
                'country' => $data['country'],
                'company_name' => $data['company_name'],
                'bank_name' => $data['bank_name'],
                'street' => $data['street'],
                'city' => $data['city'],
                'zipcode' => $data['zipcode'],

            ]);

            // Konvertiere den Tenant-Namen in das gewünschte Format
            $formattedName = $this->convertToSlug($tenant->name);

            // Update den Tenant mit dem formatierten Namen
            $tenant->update([
                'url_subsite' => $formattedName,
            ]);

        }

        return redirect()
            ->route('api.manager')
            ->with('message', 'Your Request has been enregistred, please wait until our admin team review it and answer it.');
    }

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

    #[On('refresh')]
    public function refreshPage()
    {

        $this->refresh();
    }

    public function previewToggled()
    {
        $this->dispatch('button-toggled');

        $this->toggleButton = !$this->toggleButton;
    }

    public function render()
    {
        return view('livewire.api.index', [
            'apiToken' => $this->apiToken,
            'userStatus' => $this->userStatus,

        ]);
    }
}
