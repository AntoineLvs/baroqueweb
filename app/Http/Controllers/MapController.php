<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Panoscape\History\Events\ModelChanged;

class MapController extends Controller
{


    // mapbox

    public function getResponse()
    {
        $response = Http::get('https://api.mapbox.com/datasets/v1/elsenmedia/ckvsnxal129qg27qrclgdhekc/features?access_token=sk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbHB2MmVnYWwwMTZtMmtwOWRnMGg0MjBjIn0.FIatojtElq0bfLj8G9xVhw');

        echo $response->body();
    }

    public function getGeoResponse()
    {
        $response = Http::get('https://api.mapbox.com/geocoding/v5/mapbox.places/Hamburg.json?access_token=sk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJja3ZwZW5xeDc2MmswMnFvazVtZGNnamF4In0.ENCXpCZYbOzm9WGzd2NeDg');

        $data = json_decode($response, true);

        ddd($data);
    }

    public function getCoordinates(Request $request, Location $location)
    {
        $address = $request->input('address');
        $zipcode = $request->input('zipcode');
        $city = $request->input('city');
        $lat = '';


        $fullAddress = $address . ' ' . $zipcode . ' ' . $city;

        $token = 'sk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbHB2MmVnYWwwMTZtMmtwOWRnMGg0MjBjIn0.FIatojtElq0bfLj8G9xVhw';

        $baseUrl = 'https://api.mapbox.com/geocoding/v5/mapbox.places/';
        $addressEncoded = urlencode($fullAddress) . '.json';

        $url = "{$baseUrl}{$addressEncoded}?access_token={$token}";


        try {
            $response = Http::get($url);


            if ($response->successful()) {

                $data = $response->json();

                if (!empty($data['features']) && count($data['features']) > 0) {

                    $coordinates = $data['features'][0]['geometry']['coordinates'];
                    $lat = $coordinates[1];
                    $lng = $coordinates[0];

                    session(['coordinates' => ['lat' => $lat, 'lng' => $lng]]);

                    return redirect()->back();
                }
            } else {
                dd($response);
            }
        } catch (\Exception $e) {
            Log::error('Mapbox API Exception: ' . $e->getMessage());
        }

        return back();
    }
}
