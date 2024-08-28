<?php

namespace App\Exports;

use App\Models\Location;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LocationsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Location::all();
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
            'product_id',
            'created_at',
            'updated_at',
        ];
    }


}
