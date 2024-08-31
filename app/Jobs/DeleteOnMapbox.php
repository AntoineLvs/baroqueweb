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

class DeleteOnMapbox implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $locationId;

    public function __construct($locationId)
    {
        $this->locationId = $locationId;
    }

    public function handle(): void
    {
        $location = Location::find($this->locationId);

        if (!$location) {
            Log::error("Location not found with ID: " . $this->locationId);
            return;
        }

        // Votre access token Mapbox
        $token = 'sk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbHB2MmVnYWwwMTZtMmtwOWRnMGg0MjBjIn0.FIatojtElq0bfLj8G9xVhw';

        // ID de la feature à supprimer
        $feature_id = strval($location->id);

        // Envoyer la requête DELETE à l'API Mapbox
        $response = Http::delete('https://api.mapbox.com/datasets/v1/elsenmedia/ckvsnxal129qg27qrclgdhekc/features/' . $feature_id . '?access_token=' . $token);

        if ($response->successful()) {
            Log::info("Location successfully deleted with ID: " . $this->locationId);
        
        } else {
            // Log error response
            Log::error('Mapbox delete request failed', ['status' => $response->status(), 'response' => $response->body()]);
        }
    }
}
