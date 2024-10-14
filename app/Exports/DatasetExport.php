<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DatasetExport implements FromCollection, WithHeadings
{
    protected $features;

    public function __construct($features)
    {
        $this->features = $features;
    }

    public function collection()
    {

        return collect($this->features)->map(function ($feature) {

            $fullAddress = $feature['address'] ?? '';
            $addressParts = explode(',', $fullAddress);

            $address = trim($addressParts[0] ?? '');
            $zipcodeAndCity = trim($addressParts[1] ?? '');


            $zipcodeCityParts = explode(' ', $zipcodeAndCity);
            $zipcode = trim($zipcodeCityParts[0] ?? '');
            $city = trim($zipcodeCityParts[1] ?? '');
            return [
                $feature['id'] ?? '',
                $feature['tenant_id'] ?? '',
                $feature['name'] ?? '',
                $feature['description'] ?? 'NULL',
                $address ?? '',
                $city ?? '',
                $zipcode ?? '',
                'Germany',
                'NULL',
                $feature['opening_start'] ?? '00:00:00',
                $feature['opening_end'] ?? '23:59:00',
                '24 Stunden geöffnet',
                1,
                1,
                2,
                $feature['coordinates'][0] ?? '',
                $feature['coordinates'][1] ?? '',
                $feature['location_type_id'] ?? 1,
                $feature['service_types'] ?? '[]',
                $feature['products'] ?? '[]',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'id',
            'tenant_id',
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
            'product_id'
        ];
    }
}
