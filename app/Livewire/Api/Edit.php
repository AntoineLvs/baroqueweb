<?php

namespace App\Livewire\Api;

use App\Models\Tenant;
use App\Models\TokenType;
use App\Models\User;
use Livewire\Component;
use Carbon\Carbon;

class Edit extends Component
{
    public $api_token;
    public $token;
    public $tenant_id;
    public $user_id;
    public $token_type_id;
    public $api_calls_count;
    public $expires_at;
    public $created_at;

    public $token_types;
    public $users;
    public $tenants;



    public function mount($api_token)
    {
        $this->api_token = $api_token;

        $this->api_token = $api_token;

        $this->token = $api_token->token;
        $this->tenant_id = $api_token->tenant_id;
        $this->user_id = $api_token->user_id;
        $this->token_type_id = $api_token->token_type_id;
        $this->api_calls_count = $api_token->api_calls_count;

        $this->expires_at = $api_token->expires_at ? Carbon::parse($api_token->expires_at)->format('Y-m-d') : null;
        $this->created_at = $api_token->created_at ? $api_token->created_at->format('Y-m-d') : null;

        $users = User::all();
        $this->users = $users;

        $tenants = Tenant::all();
        $this->tenants = $tenants;

        $token_types = TokenType::all();
        $this->token_types = $token_types;
    }


    public function render()
    {

        return view('livewire.api.edit');
    }

    public function submit()
    {
        $data = $this->validate([
            'token' => 'required|max:100',
            'tenant_id' => 'required|max:100',
            'user_id' => 'required|max:100',
            'token_type_id' => 'required|max:100',
            'api_calls_count' => 'required|max:100',
            'expires_at' => 'required|max:100',
            'created_at' => 'required|max:100',

        ]);

        $this->api_token->token = $this->token;
        $this->api_token->tenant_id = $this->tenant_id;
        $this->api_token->user_id = $this->user_id;
        $this->api_token->token_type_id = $this->token_type_id;
        $this->api_token->api_calls_count = $this->api_calls_count;
        $this->api_token->expires_at = $this->expires_at;
        $this->api_token->created_at = $this->created_at;

        $this->api_token->fresh();
        $this->api_token->save();

        return redirect()
            ->route('api-token.edit', $this->api_token)
            ->with('message', 'Api Token wurde aktualisiert.');
    }
}
