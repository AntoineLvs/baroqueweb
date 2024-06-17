<?php

namespace App\Livewire\Api;

use App\Models\ApiToken;
use App\Models\Tenant;
use App\Models\TokenType;
use App\Models\User;
use App\Scopes\TenantScope;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class ActiveTokenTable extends Component
{

    public $users;
    public $api_tokens;

    public $selectedUserId;
    public $url;
    public $apiTokenId;
    public $userName;

    public function updatedSelectedUserId()
    {

        $user = User::where('id', $this->selectedUserId)->first();

        $this->userName = User::where('id', $this->selectedUserId)->value('name');
        $tenantId = $user->tenant_id;
        $apiTokenId = ApiToken::where('tenant_id', $tenantId)->value('id');
        $url = route('api-token.user.show', ['apiTokenId' => $apiTokenId, 'userId' => $this->selectedUserId]);
        $this->url = $url;
    }


    public function mount($api_tokens)
    {

        $this->api_tokens = $api_tokens;
    }

    public function render()
    {
        return view('livewire.api.active-token-table', [
            'api_tokens' => $this->api_tokens
        ]);
    }
}
