<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IdealCsvTemplateExport implements FromCollection, WithHeadings
{
    // Returning a dummy data row for the template
    public function collection()
    {
        return collect([
            [
                '1',
                'Beispieldienst',
                'Dies ist eine Testdienstbeschreibung',
                'Musterstraße 12',
                'Hamburg',
                '20095',
                'Deutschland',
                '',
                '08:00',
                '18:00',
                'Nur an Wochentagen geöffnet',
                '1',
                '1',
                'aktiv',
                '9.993682',
                '53.551086',
                '2',
                '[]',
                '[]',
                '',
                ''
            ]
        ]);
    }

    public function headings(): array
    {
        return [
            'id',
            'name',
            'description',
            'address',
            'city',
            'zipcode',
            'country',
            'distance',
            'opening_start',
            'opening_end',
            'opening_info',
            'active',
            'verified',
            'status',
            'lng',
            'lat',
            'location_type_id',
            'service_id',
            'product_id',
            'created_at',
            'updated_at',
        ];
    }
}
