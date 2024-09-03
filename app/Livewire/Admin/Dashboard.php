<?php

namespace App\Livewire\Admin;

use App\Models\Location;
use App\Models\MapboxRecord;
use App\Scopes\TenantScope;
use Livewire\Component;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Aws\S3\S3Client;

class Dashboard extends Component
{
    public $locations;
    public $all_locations;
    public $pushedLocations;
    public $toggleButton = false;
    public $commonIds = [];

    public $uploadId;
    public $username = 'elsenmedia';
    public $accessToken = 'sk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbHB2MmVnYWwwMTZtMmtwOWRnMGg0MjBjIn0.FIatojtElq0bfLj8G9xVhw';


    public function toggleButton()
    {
        $this->toggleButton = !$this->toggleButton;
    }
    public function mount()
    {
        
    }


    public function exportDataset()
    {
        $datasetId = 'ckvsnxal129qg27qrclgdhekc';
        $tilesetId = 'elsenmedia.ckvsnxal129qg27qrclgdhekc-330dh';
        $tilesetName = 'efuelmap_v1';

        // Get the GeoJSON data of the dataset
        $datasetUrl = "https://api.mapbox.com/datasets/v1/{$this->username}/{$datasetId}/features?access_token={$this->accessToken}";
        $response = Http::get($datasetUrl);

        if (!$response->successful()) {
            Log::error('Failed to fetch dataset', ['status' => $response->status(), 'response' => $response->body()]);
            session()->flash('error', 'Failed to fetch dataset.');
            return;
        }

        $geojson = $response->body(); // Data GeoJSON of the dataset

        if (empty($geojson)) {
            Log::error('GeoJSON data is empty');
            session()->flash('error', 'GeoJSON data is empty.');
            return;
        }

        // Generate upload credentials
        $credentialsUrl = "https://api.mapbox.com/uploads/v1/{$this->username}/credentials?access_token={$this->accessToken}";
        $response = Http::post($credentialsUrl);

        if (!$response->successful()) {
            Log::error('Failed to get upload credentials', ['status' => $response->status(), 'response' => $response->body()]);
            session()->flash('error', 'Failed to get upload credentials.');
            return;
        }

        $credentials = $response->json(); // Information temporary S3 identification

        // Upload data to S3
        $s3Client = new S3Client([
            'version' => 'latest',
            'region' => 'us-east-1',
            'credentials' => [
                'key'    => $credentials['accessKeyId'],
                'secret' => $credentials['secretAccessKey'],
                'token'  => $credentials['sessionToken'],
            ]
        ]);

        try {
            $result = $s3Client->putObject([
                'Bucket' => $credentials['bucket'],
                'Key'    => $credentials['key'],
                'Body'   => $geojson,
                'ACL'    => 'public-read',
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to upload data to S3', ['message' => $e->getMessage()]);
            session()->flash('error', 'Failed to upload data to S3.');
            return;
        }

        $s3Url = $credentials['url'];

        // Create upload with createUpload
        $uploadUrl = "https://api.mapbox.com/uploads/v1/{$this->username}?access_token={$this->accessToken}";

        $uploadResponse = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post($uploadUrl, [
            'tileset' => $tilesetId,
            'url'     => $s3Url,
            'name'    => $tilesetName,
        ]);

        if (!$uploadResponse->successful()) {
            Log::error('Failed to create tileset upload', [
                'status' => $uploadResponse->status(),
                'response' => $uploadResponse->body(),
            ]);
            session()->flash('error', 'Failed to create tileset upload.');
            return;
        }

        $uploadData = $uploadResponse->json();
        $this->uploadId = $uploadData['id']; // Store the upload ID for future verification
        session()->flash('message', 'Upload initiated successfully ! It will be processed in the background.');
        $this->updateStatus();
    }

    public function updateStatus()
    {
        $createdLocations = Location::where('status', 12)->get();
        $disabledLocations = Location::where('status', 15)->get();
        $deletedLocations = Location::where('status', 17)->get();

        foreach ($createdLocations as $location) {
            $location->update(['status' => 2]);
        }

        foreach ($disabledLocations as $location) {
            $location->update(['status' => 5]);
        }

        foreach ($deletedLocations as $location) {
            $location->delete();
        }
    }
    public function refreshData()
    {
        $this->render();
        session()->flash('message', 'Data refreshed successfully !');

    }

    public function render()
    {
        $this->locations = Location::withoutGlobalScope(TenantScope::class)
            ->where(function ($query) {
                // Conditions to get every location that has been created/edited and need to be pushed online
                $query->where('active', 1)
                    ->where('verified', 0)
                    ->whereIn('status', [0, 1]);
            })
            ->orWhere(function ($query) {
                // Conditions to get every location that is online, and need to be disable
                $query->where('active', 0)
                    ->where('verified', 1)
                    ->where('status', 4);
            })
            ->orWhere(function ($query) {
                //  Conditions to get every location that has been disabled, and need to be reactivate
                $query->where('active', 1)
                    ->where('verified', 1)
                    ->where('status', 5);
            })
            ->orWhere(function ($query) {
                //  Conditions to get every location that need to be deleted
                $query->where('verified', 1)
                    ->whereIn('status', [6, 7]);
            })->limit(25)->get();
        $this->all_locations = Location::all();

        $this->pushedLocations = Location::where(function ($query) {
            $query->where('status', 12)
                ->orWhere('status', 15)
                ->orWhere('status', 17);
        })->limit(25)->get();
        $locationIds = $this->pushedLocations->pluck('id');

        $mapboxLocationIds = MapboxRecord::getLocations();

        // Compare les IDs pour trouver les IDs qui sont communs
        $this->commonIds = array_intersect($locationIds->toArray(), $mapboxLocationIds);
        $this->commonIds = count($this->commonIds);
         return view('livewire.admin.dashboard', [
            'locations' => $this->locations,
            'all_locations' => $this->all_locations,
            'commonIds' => $this->commonIds,
            'pushedLocations' => $this->pushedLocations,
        ]);
    }
}
