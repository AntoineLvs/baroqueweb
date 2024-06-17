<?php

namespace App\Livewire\ApiTokenType;

use App\Models\BaseProduct;
use App\Models\TokenType;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateApiTokenType extends Component
{
    use WithFileUploads;

    public $file;

    public $name;
    public $description;
    public $marketing;
    public $monthly_cost;
    public $api_call_cost;
    public $setup_cost;
    public $tax_rate;
    public $contract_duration;

    public $api_token_types;

    public function mount()
    {
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
            'tax_rate' => 'required|max:100',
            'contract_duration' => 'required|max:100',

        ]);

        $api_token_type = TokenType::create($data);

        $api_token_type->fresh();
        $api_token_type->save();

        return redirect()
            ->route('api-token-types.index')
            ->with('message', 'License was created successfully.');
    }

    public function render()
    {
        return view('livewire.api-token-type.create-api-token-type');
    }
}
