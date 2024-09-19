<?php

namespace App\Livewire\Api;

use App\Models\ApiToken;
use Livewire\Component;
use App\Models\Manufacturer;
use App\Models\Vehicle;
use App\Models\Engine;
use App\Models\Release;
use App\Models\Tenant;
use App\Models\TokenType;
use App\Models\User;
use App\Scopes\TenantScope;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

class Demo extends Component
{

    public $toggleButton = true;

    public $buttonColor;
    public $backgroundColor;
    public $fontColor;
    public $buttonFontColor;
    public $customLogoUrl;
    public $personalText;
    public $defaultLogoPath = 'https://refuelos.com/assets/img/xtl-logo.png';

    public $hasToken = false;

    public $userStatus;
    public $apiToken;

    public $token_type_1;
    public $token_type_2;


    public $tenantId;

    
    public function updateCustomLogo()
    {
        $this->validate([
            'customLogoUrl' => 'url',
        ]);
    }

    public function submit()
    {
        $data = $this->validate([
            'buttonColor' => 'nullable|string|max:100',
            'backgroundColor' => 'nullable|string|max:100',
            'fontColor' => 'nullable|string|max:100',
            'buttonFontColor' => 'nullable|string|max:100',
            'customLogoUrl' => 'nullable|string|max:255',
            'personalText' => 'nullable|string|max:255',
        ]);

        $userId = Auth::id();

        $settings = [
            'buttonColor' => $data['buttonColor'],
            'backgroundColor' => $data['backgroundColor'],
            'fontColor' => $data['fontColor'],
            'buttonFontColor' => $data['buttonFontColor'],
            'customLogoUrl' => $data['customLogoUrl'],
            'personalText' => $data['personalText'],
        ];

        $ciSettingsJson = json_encode($settings);

        User::where('id', $userId)->update([
            'ci_settings' => $ciSettingsJson,
            'ci_last_edit' => now(),
        ]);

        return redirect()
            ->route('api.manager')
            ->with('message', 'Your custom settings have been enregistered, you can now use the source code.');
    }

    public function mount($userStatus)
    {
        $this->userStatus = $userStatus;

        $this->token_type_1 = TokenType::withoutGlobalScope(TenantScope::class)->find(1);
        $this->token_type_2 = TokenType::withoutGlobalScope(TenantScope::class)->find(2);
        $user = Auth::user();

        $ciSettings = json_decode($user->ci_settings, true);

        $this->buttonColor = $ciSettings['buttonColor'] ?? '#5147e5';
        $this->backgroundColor = $ciSettings['backgroundColor'] ?? '#f8f9fb';
        $this->fontColor = $ciSettings['fontColor'] ?? '#000000';
        $this->buttonFontColor = $ciSettings['buttonFontColor'] ?? '#ffffff';
        $this->customLogoUrl = $ciSettings['customLogoUrl'] ?? 'https://refuelos.com/assets/img/xtl-logo.png';
        $this->personalText = $ciSettings['personalText'] ?? "Suchen Sie nach einer XTL Freigabe.";

        $this->tenantId = $user->tenant_id ?? null;


        $this->checkUserToken();
    }

    public function checkUserToken()
    {
        if (Auth::check()) {
            $user = Auth::user();

            $userId = $user->id;
            $tenantId = $user->tenant_id;

            $existingToken = ApiToken::where('tenant_id', $tenantId)->exists();
            $apiToken = ApiToken::where('tenant_id', $tenantId)->value('token');

            $this->hasToken = $existingToken;
            $this->apiToken = $apiToken;

            session(['apiToken' => $apiToken, 'userId' => $userId, 'tenantId' => $tenantId]);

            $this->dispatch('has-token', ['apiToken' => $apiToken, 'userId' => $userId, 'tenantId' => $tenantId]);
        }
    }

    public function resetCiSettings()
    {
        $user = Auth::user();

        $userId = $user->id;

        User::where('id', $userId)->update([
            'ci_settings' => null,
            'ci_last_edit' => now(),
        ]);

        return redirect()
            ->route('api.manager')
            ->with('message', 'Your custom settings have been reset, you can now use the source code.');
    }


    public function render()
    {
        return view('livewire.api.demo');
    }
}
