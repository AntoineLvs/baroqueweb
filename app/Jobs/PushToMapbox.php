<?php

namespace App\Jobs;

use App\Models\Location;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Service;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PushToMapbox implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $locationId;

    public function __construct($locationId)
    {
        $this->locationId = $locationId;
    }

    public function handle(): void
    {
        $location = Location::with(['location_type', 'tenant'])->find($this->locationId);

        if (!$location) {
            Log::error("Location not found with ID: " . $this->locationId);
            return;
        }

        // default public token
        // $token = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJja3ZlYW9iZHQwcXJpMm9vMHp6YXl2dHFhIn0.FqjCjUzMT0v_HsVw2bSxbw';

        // refuelos-2 accessToken
        $token = 'sk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbHB2MmVnYWwwMTZtMmtwOWRnMGg0MjBjIn0.FIatojtElq0bfLj8G9xVhw';

        // Utilisez l'instance $location pour récupérer les données nécessaires et envoyer la requête
        $lat = $location->lat;
        $lng = $location->lng;
        $feature_id = strval($location->id);
        $opening_start = substr($location->opening_start, 0, 5);
        $opening_end = substr($location->opening_end, 0, 5);
        $address = "{$location->address}, {$location->zipcode} {$location->city}";

        // Vérifications pour éviter les erreurs
        $locationTypeName = $location->location_type?->name ?? 'default_location_type';
        $tenantName = $location->tenant?->name ?? 'default_tenant';
        $tenantLogo = $location->tenant?->photo ?? '';
        $tenantId = $location->tenant_id;

        $product_ids = json_decode($location->product_id);
        $products = Product::whereIn('id', $product_ids)->get();
        $product_types_ids = $products->pluck('product_type_id')->all();
        $product_types_json = json_encode($product_types_ids);

        $service_ids = json_decode($location->service_id);
        $services = Service::whereIn('id', $service_ids)->get();
        $service_types_ids = $services->pluck('base_service_id')->all();
        $service_types_json = json_encode($service_types_ids);

        $body = [
            'id' => $feature_id,
            'type' => "Feature",
            'properties' => [
                'id' => $feature_id,
                'name' => $location->name ?? 'default_name',
                'description' => $location->description ?? 'default_description',
                'type' => $locationTypeName,
                'tenant' => $tenantName,
                'tenant_id' => $tenantId,
                'tenant_logo' => $tenantLogo ?? '',
                'opening_start' => $opening_start ?? '00:01',
                'opening_end' => $opening_end ?? '23:59',
                'address' => $address,
                'active' => $location->active,
                'product_types' => $product_types_json ?? '[]',
                'service_types' => $service_types_json ?? '[]',
                'products' => $location->product_id ?? '[]',
                'services' => $location->service_id ?? '[]'
            ],
            'geometry' => [
                'coordinates' => [$lng, $lat],
                'type' => "Point"
            ]
        ];

        // Envoyer la requête à l'API Mapbox
        $response = Http::withBody(
            json_encode($body),
            'application/json'
        )->put('https://api.mapbox.com/datasets/v1/elsenmedia/ckvsnxal129qg27qrclgdhekc/features/' . $feature_id . '?access_token=' . $token);

        if ($response->successful()) {
            $responseData = $response->json();
            // Log successful response or handle as needed
        } else {
            // Log error response
            Log::error('Mapbox request failed', ['status' => $response->status(), 'response' => $response->body()]);
        }
    }
    //here is an attempt to push the dataset to the Tileset without having to do it manually on Mapbox, but it didn't work, as I don't know if it's really possible to do...
    protected function publishDataset($token, $dataset_id)
    {
        // dd("https://api.mapbox.com/datasets/v1/elsenmedia/{$dataset_id}/exports?access_token={$token}");

        // $response = Http::post('https://api.mapbox.com/datasets/v1/elsenmedia/' . $dataset_id . '/exports?access_token=' . $token . '', [
        //     'type' => 'tileset'
        // ]);
        // if ($response->successful()) {

        //     dd('Dataset with ' .  $this->location->name . ' has been published successfully');
        // } else {
        //     dd($response->status());
        // }
    }
}
