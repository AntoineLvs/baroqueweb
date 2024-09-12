<?php

namespace App\Imports;

use App\Models\Event;
use App\Models\EventAttendee;
use App\Models\Location;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToCollection;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class adminLocationsImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $location = Location::updateOrCreate(
                ['id' => $row['id']],
                [
                    'tenant_id' => $row['tenant_id'],
                    'name' => $row['name'],
                    'description' => $row['description'],
                    'address' => $row['address'],
                    'city' => $row['city'],
                    'zipcode' => $row['zipcode'],
                    'country' => $row['country'],
                    'distance' => $row['distance'],
                    'opening_start' => $row['opening_start'],
                    'opening_end' => $row['opening_end'],
                    'opening_info' => $row['opening_info'],
                    'active' => $row['active'],
                    'verified' => $row['verified'],
                    'status' => $row['status'],
                    'lng' => $row['lng'],
                    'lat' => $row['lat'],
                    'location_type_id' => $row['location_type_id'],
                    'service_id' => is_array($row['service_id']) ? json_encode($row['service_id']) : $row['service_id'],
                    'product_id' => is_array($row['product_id']) ? json_encode($row['product_id']) : $row['product_id'],
                    'created_at' => $row['created_at'],
                    'updated_at' => $row['updated_at']
                ]
            );
        }
    }
}
