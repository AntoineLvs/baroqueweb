<?php

namespace App\Livewire\Locations;


use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Aws\S3\S3Client;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DatasetExport;
use App\Models\Location;
use Illuminate\Support\Facades\Storage;

class ImportMapbox extends Component
{

    public $username = 'elsenmedia';
    public $accessToken = 'sk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbHB2MmVnYWwwMTZtMmtwOWRnMGg0MjBjIn0.FIatojtElq0bfLj8G9xVhw';
    public $importedLocations = [];


    public function importDataset()
    {
        $datasetId = 'ckvsnxal129qg27qrclgdhekc';
        $accessToken = 'sk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbHB2MmVnYWwwMTZtMmtwOWRnMGg0MjBjIn0.FIatojtElq0bfLj8G9xVhw';
        $username = 'elsenmedia';

        // Get the GeoJSON data of the dataset
        $datasetUrl = "https://api.mapbox.com/datasets/v1/{$username}/{$datasetId}/features?access_token={$accessToken}";
        $response = Http::get($datasetUrl);

        if (!$response->successful()) {
            Log::error('Failed to fetch dataset', ['status' => $response->status(), 'response' => $response->body()]);
            session()->flash('error', 'Failed to fetch dataset.');
            return;
        }

        $geojson = json_decode($response->body(), true);

        if (empty($geojson['features'])) {
            Log::error('GeoJSON data is empty');
            session()->flash('error', 'GeoJSON data is empty.');
            return;
        }

        $this->importedLocations = collect($geojson['features'])
            ->map(function ($feature) {
                $fullAddress = $feature['properties']['address'] ?? '';
                $addressParts = explode(',', $fullAddress);

                $address = trim($addressParts[0] ?? '');
                $zipcodeAndCity = trim($addressParts[1] ?? '');
                $zipcodeCityParts = explode(' ', $zipcodeAndCity);
                $zipcode = trim($zipcodeCityParts[0] ?? '');
                $city = trim($zipcodeCityParts[1] ?? '');

                return [
                    'id' => $feature['properties']['id'] ?? '',
                    'tenant_id' => $feature['properties']['tenant_id'] ?? '',
                    'name' => $feature['properties']['name'] ?? '',
                    'description' => $feature['properties']['description'] ?? 'NULL',
                    'address' => $address,
                    'city' => $city,
                    'zipcode' => $zipcode,
                    'country' => 'Germany',
                    'lng' => $feature['geometry']['coordinates'][0] ?? '',
                    'lat' => $feature['geometry']['coordinates'][1] ?? '',
                    'opening_start' => $feature['properties']['opening_start'] ?? '00:00:00',
                    'opening_end' => $feature['properties']['opening_end'] ?? '23:59:00',
                    'active' => 1,
                    'verified' => 1,
                    'status' => 2,
                    'type' => 1,
                    'product_types' =>  $feature['properties']['products'] ?? [],
                    'service_types' =>  $feature['properties']['services'] ?? [],

                ];
            })
            ->sortBy('id')
            ->values()
            ->toArray();

        session()->flash('message', 'Dataset imported successfully! Ready to generate Excel.');
    }


    public function saveImportedLocations()
    {
        foreach ($this->importedLocations as $locationData) {

            $location = Location::updateOrCreate(
                ['id' => $locationData['id']],
                [
                    'tenant_id' => $locationData['tenant_id'],
                    'name' => $locationData['name'],
                    'description' => $locationData['description'],
                    'address' => $locationData['address'],
                    'city' => $locationData['city'],
                    'zipcode' => $locationData['zipcode'],
                    'country' => $locationData['country'],
                    'distance' => $locationData['distance'] ?? NULL,
                    'opening_start' => $locationData['opening_start'],
                    'opening_end' => $locationData['opening_end'],
                    'opening_info' => $locationData['opening_info'] ?? NULL,
                    'active' => $locationData['active'],
                    'verified' => $locationData['verified'],
                    'status' => $locationData['status'],
                    'lng' => $locationData['lng'],
                    'lat' => $locationData['lat'],
                    'location_type_id' => 1,
                    'service_id' => $locationData['service_types'], 
                    'product_id' => $locationData['product_types'], 
                ]
            );
        }

        session()->flash('message', 'Locations saved successfully!');
    }

    public function mount() {}




    public function render()
    {
        return view('livewire.locations.import-mapbox', [
            'importedLocations' => $this->importedLocations,

        ]);
    }
}
