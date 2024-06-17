<?php

namespace App\Livewire\SepaMandate;

use Livewire\Component;

class EditSepaMandate extends Component
{
    public $sepa_mandate;

    public $description;
    public $creditor_informations;
    public $mandate_reference;
    public $mandate_type;
    public $payer_name;
    public $payer_address;
    public $payer_iban;
    public $payer_bic;
    public $payer_bank;
    public $payment_type;



    public function mount($sepa_mandate)
    {

        $this->sepa_mandate = $sepa_mandate;

        $this->description = $sepa_mandate->description;
        $this->creditor_informations = $sepa_mandate->creditor_informations;
        $this->mandate_reference = $sepa_mandate->mandate_reference;
        $this->mandate_type = $sepa_mandate->mandate_type;
        $this->payer_name = $sepa_mandate->payer_name;
        $this->payer_address = $sepa_mandate->payer_address;
        $this->payer_iban = $sepa_mandate->payer_iban;
        $this->payer_bic = $sepa_mandate->payer_bic;
        $this->payer_bank = $sepa_mandate->payer_bank;
        $this->payment_type = $sepa_mandate->payment_type;

    }

    public function submit()
    {
        $data = $this->validate([
            'description' => 'string|max:500|nullable',
            'creditor_informations' => 'string|max:500|nullable',
            'mandate_reference' => 'string|max:100|nullable',
            'mandate_type' => 'string|max:100|nullable',
            'payer_name' => 'string|max:100|nullable',
            'payer_address' => 'string|max:100|nullable',
            'payer_iban' => 'string|max:100|nullable',
            'payer_bic' => 'string|max:100|nullable',
            'payer_bank' => 'string|max:100|nullable',
            'payment_type' => 'string|max:100|nullable',
        ]);

        $this->sepa_mandate->description = $this->description;
        $this->sepa_mandate->creditor_informations = $this->creditor_informations;
        $this->sepa_mandate->mandate_reference = $this->mandate_reference;
        $this->sepa_mandate->mandate_type = $this->mandate_type;
        $this->sepa_mandate->payer_name = $this->payer_name;
        $this->sepa_mandate->payer_address = $this->payer_address;
        $this->sepa_mandate->payer_iban = $this->payer_iban;
        $this->sepa_mandate->payer_bic = $this->payer_bic;
        $this->sepa_mandate->payer_bank = $this->payer_bank;
        $this->sepa_mandate->payment_type = $this->payment_type;
        $this->sepa_mandate->fresh();
        $this->sepa_mandate->save();

        return redirect()
            ->route('sepa-mandates.edit', $this->sepa_mandate)
            ->with('message', 'Sepamandate wurde aktualisiert.');

    }
    public function render()
    {
        return view('livewire.sepa-mandate.edit-sepa-mandate');
    }
}
