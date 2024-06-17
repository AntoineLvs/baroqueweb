<?php

namespace App\Livewire\Api;

use App\Models\ApiToken;
use Livewire\Component;
use App\Models\TokenType;
use App\Models\User;
use App\Models\SepaMandate;
use App\Scopes\TenantScope;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Jobs\MailCancelLicense;
use Illuminate\Support\Facades\Log;

class LicenseManagerCompleted extends Component
{

    public $toggleButton = true;
    public $hasToken = false;
    public $user;
    public $apiToken;
    public $tenantId;
    public $userStatus;
    public $tokenType;
    public $daysRemaining;
    public $userId;


    public $token_type_1;
    public $token_type_2;

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
    public $token_type;
    public $api_token;
    public $payer_address;
    public $payer_iban;
    public $payer_bic;
    public $payer_bank;
    public $payment_type;
    public $grant_date;
    public $payer_name;

    public $selectedLicense;
    public $selectedToken;


    public $toggleChecked;

    public $toggleCheckedSepa;
    public $toggleCheckedLegal;
    public $toggleCheckedDisclaimer;

    public $showConfirmationModal = false;

    public function mount()
    {


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

    public function cancelLicense($userId)
    {
       // Log::info("Bro is"  . $userId);

        $user = User::find($userId);
        $token =$user->apiToken();
        $token->canceled_at= now();
        $token->save();

        MailCancelLicense::dispatch($userId);


        return redirect()
            ->route('api.license-manager')
            ->with('message', 'Ihre Lizenz wurde gekündigt.');


    }

    public function confirmLicenseCancellation()
    {
        $this->showConfirmationModal = true;
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

            if ($this->userStatus == 100) {
                $sepa_mandate = SepaMandate::where('tenant_id', $this->tenantId ?? null)->first();
                $this->userId = $this->user->id;
                $this->payer_iban = $sepa_mandate->payer_iban;
                $this->payer_bic = $sepa_mandate->payer_bic;
                $this->payer_name = $sepa_mandate->payer_name;
                $this->payer_bank = $sepa_mandate->payer_bank;
                $this->payer_address = $sepa_mandate->payer_address;
                $this->url_subsite = $this->user->url_subsite;
                $this->token_type = TokenType::withoutGlobalScopes()->where('id', $this->apiToken->token_type_id)->first();

                $this->toggleChecked = true;
                $this->toggleCheckedSepa = true;
                $this->toggleCheckedLegal = true;
                $this->toggleCheckedDisclaimer = true;


            }

            $this->hasToken = $this->apiToken ? true : false;
            $this->dispatch('has-token', ['apiToken' => $this->apiToken]);
        }
    }

    public function render()
    {
        return view('livewire.api.license-manager-completed', [
            'apiToken' => $this->apiToken,
            'userStatus' => $this->userStatus,
        ]);
    }
}
