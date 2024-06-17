<?php

namespace App\Livewire\Api;

use App\Http\Controllers\DocumentController;
use App\Mail\LicenseConfirmedMail;
use App\Mail\LicenseRefusedMail;
use App\Mail\LicenseRequestMail;
use App\Models\ApiToken;
use App\Models\Invoice;
use App\Models\SepaMandate;
use App\Models\Settings;
use App\Models\Tenant;
use App\Models\TokenType;
use App\Models\User;
use App\Scopes\TenantScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;


class TokenRequestTable extends Component
{

    public $users;
    public $token_types;

    public function mount($users)
    {
        $this->token_types = TokenType::withoutGlobalScope(TenantScope::class)->get();

        $this->users = $users;
    }

    public function assignApiToken($userId)
    {
        $user = User::find($userId);
        $today = now();

        if ($user) {
            $tenantId = $user->tenant_id;
            $status = $user->status;

            if (!ApiToken::where('user_id', $userId)->exists()) {
                $token = bin2hex(random_bytes(32));

                $tokenTypeId = $status;

                $tokenType = TokenType::find($tokenTypeId);
                $sepaMandate = SepaMandate::where('user_id', $userId)->first();

                if ($tokenType) {
                    $contractDuration = $tokenType->contract_duration;

                    $expiresAt = now()->addDays($contractDuration);

                    ApiToken::create([
                        'token' => $token,
                        'user_id' => $userId,
                        'tenant_id' => $tenantId,
                        'token_type_id' => $tokenTypeId,
                        'expires_at' => $expiresAt,
                    ]);

                    $user->update([
                        'status' => 100,
                        'last_sent_at' => $today,
                        'billing_count' => 0
                    ]);

                    $api_token = $token;

                   // $this->createInvoice($user);
                }
                Mail::to($user->email)->send(new LicenseConfirmedMail($user, $sepaMandate, $tokenType));
            }
        }


        return redirect(request()->header('Referer'));
    }

    public function createInvoice($user)
    {
        $DocumentController = new DocumentController();
        $invoice = $DocumentController->createInvoice($user);

        return redirect(request()->header('Referer'));
    }


    public function refuseRequestToken($userId)
    {
        $user = User::find($userId);

        if ($user) {
            $user->update(['status' => 99]);
        }

        Mail::to($user->email)->send(new LicenseRefusedMail($user));

        return redirect(request()->header('Referer'));
    }


    public function render()
    {
        return view('livewire.api.token-request-table', [
            'users' => $this->users
        ]);
    }
}
