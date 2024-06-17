<?php

namespace App\Livewire\ApiTokenType;

use App\Models\Tenant;
use App\Models\TokenType;
use App\Models\User;
use Livewire\Component;
use Carbon\Carbon;

class EditApiTokenType extends Component
{
    public $api_token_type;
    public $name;
    public $description;
    public $monthly_cost;
    public $api_call_cost;
    public $setup_cost;
    public $contract_duration;
    public $marketing;
    public $tax_rate;

    public function mount($api_token_type)
    {
        $this->api_token_type = $api_token_type;


        $this->name = $api_token_type->name;
        $this->description = $api_token_type->description;
        $this->marketing = $api_token_type->marketing;
        $this->monthly_cost = $api_token_type->monthly_cost;
        $this->api_call_cost = $api_token_type->api_call_cost;
        $this->setup_cost = $api_token_type->setup_cost;
        $this->contract_duration = $api_token_type->contract_duration;
        $this->tax_rate = $api_token_type->tax_rate;



    }


    public function render()
    {

        return view('livewire.api-token-type.edit-api-token-type');
    }

    public function submit()
    {
        $data = $this->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:100',
            'marketing' => 'required|max:100',
            'monthly_cost' => 'required|max:100',
            'api_call_cost' => 'required|max:100',
            'setup_cost' => 'required|max:100',
            'contract_duration' => 'required|max:100',
            'tax_rate' => 'required|max:100',

        ]);

        $this->api_token_type->name = $this->name;
        $this->api_token_type->description = $this->description;
        $this->api_token_type->marketing = $this->marketing;
        $this->api_token_type->monthly_cost = $this->monthly_cost;
        $this->api_token_type->api_call_cost = $this->api_call_cost;
        $this->api_token_type->setup_cost = $this->setup_cost;
        $this->api_token_type->contract_duration = $this->contract_duration;
        $this->api_token_type->tax_rate = $this->tax_rate;

        $this->api_token_type->fresh();
        $this->api_token_type->save();

        return redirect()
            ->route('api-token-types.edit', $this->api_token_type)
            ->with('message', 'License Type wurde aktualisiert.');
    }
}
