<?php

namespace App\Exports;

use App\Models\SepaMandate;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SepaMandateExport

{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SepaMandate::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'tenant_id',
            'description',
            'user_id',
            'creditor_informations',
            'mandate_reference',
            'mandate_type',
            'payer_name',
            'payer_address',
            'payer_iban',
            'payer_bic',
            'payer_bank',
            'payment_type',
            'grant_date',
            'created_at',
            'updated_at',
        ];
    }

}
