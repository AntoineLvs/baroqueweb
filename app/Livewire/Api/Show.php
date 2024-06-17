<?php

namespace App\Livewire\Api;

use App\Models\Tenant;
use App\Models\TokenType;
use App\Models\User;
use Livewire\Component;
use Carbon\Carbon;

class Show extends Component
{
    public $api_token;
    public $token;
    public $tenant_id;
    public $user_id;
    public $token_type_id;
    public $api_calls_count;
    public $expires_at;
    public $created_at;
    public $last_sent_at;

    public $token_type;
    public $user;
    public $tenant;



    public function mount($api_token, $user)
    {
        $this->api_token = $api_token;

        $this->user = $user;

        $this->token = $api_token->token;
        $this->tenant_id = $api_token->tenant_id;
        $this->user_id = $user->user_id;
        $this->token_type_id = $api_token->token_type_id;
        $this->api_calls_count = $api_token->api_calls_count;

        $this->expires_at = $api_token->expires_at ? Carbon::parse($api_token->expires_at)->format('Y-m-d') : null;
        $this->created_at = $api_token->created_at ? $api_token->created_at->format('Y-m-d') : null;
        $this->last_sent_at = $api_token->last_sent_at ? $api_token->last_sent_at->format('Y-m-d') : null;

        $this->token_type = TokenType::where('id', $this->token_type_id)->first();
        $this->tenant = Tenant::where('id', $this->tenant_id)->first();


        $this->monthlyVerififcation($user);
    }

    public function monthlyVerififcation($user)
    {
        $today = now();

        $lastUpgradeDate = Carbon::parse($user->last_sent_at);

        if ($lastUpgradeDate->addMonth()->lte($today)) {
            $user->increment('billing_count');

            $user->update(['last_sent_at' => $today]);
        } 
    }

    public function render()
    {

        return view('livewire.api.show');
    }
}
