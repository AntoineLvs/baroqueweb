<?php

namespace App\Jobs;

use App\Models\Location;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class PushToMapbox implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $location;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Location $location)
    {
        $this->location = $location;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Location $location): void
    {
        //here we retrieve the needed data, to send it to the Mapbox API, to push a location on Mapbox's dataset
        $lat = $this->location->lat;
        $lng = $this->location->lng;

        $username = 'elsenmedia';
        $dataset_id = 'ckvsnxal129qg27qrclgdhekc';
        // default public token
        // $token = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJja3ZlYW9iZHQwcXJpMm9vMHp6YXl2dHFhIn0.FqjCjUzMT0v_HsVw2bSxbw';

        // refuelos-2 accessToken
        $token = 'sk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbHB2MmVnYWwwMTZtMmtwOWRnMGg0MjBjIn0.FIatojtElq0bfLj8G9xVhw';

        $feature_id = strval($this->location->id);
        $opening_start = substr($this->location->opening_start, 0, 5);
        $opening_end = substr($this->location->opening_end, 0, 5);
        $address = "{$this->location->address}, {$this->location->zipcode} {$this->location->city}";

        $body = [
            'id' => $feature_id,
            'type' => "Feature",
            'properties' => [
                'id' => $feature_id,
                'name' => $this->location->name,
                'description' => $this->location->description,
                'type'  => $this->location->location_type->name,
                'tenant' => $this->location->tenant->name,
                'opening_start' => $opening_start,
                'opening_end' => $opening_end,
                'address' => $address,
                'active' => $this->location->active,

            ],
            'geometry' => [
                'coordinates' => [$lng, $lat],
                'type' => "Point"
            ]
        ];

        $jsonbody = json_encode($body);

        // FORWARD geocoding to convert adress to geo infor

        $response = Http::withBody(
            json_encode($body),
            'application/json'
        )
            ->put('https://api.mapbox.com/datasets/v1/elsenmedia/ckvsnxal129qg27qrclgdhekc/features/' . $feature_id . '?access_token=' . $token . '');

        if ($response->successful()) {
            $responseData = $response->json();

            // dd($responseData);
            // $this->publishDataset($token, $dataset_id);

        } else {
            dd($response->status());
        }
    }

    //here is an attempt to push the dataset to the Tileset without having to do it manually on Mapbox, but it didn't work, as I don't know if it's really possible to do...
    protected function publishDataset($token, $dataset_id)
    {
        dd("https://api.mapbox.com/datasets/v1/elsenmedia/{$dataset_id}/exports?access_token={$token}");

        $response = Http::post('https://api.mapbox.com/datasets/v1/elsenmedia/' . $dataset_id . '/exports?access_token=' . $token . '', [
            'type' => 'tileset'
        ]);
        if ($response->successful()) {

            dd('Dataset with ' .  $this->location->name . ' has been published successfully');
        } else {
            dd($response->status());
        }
    }
}
