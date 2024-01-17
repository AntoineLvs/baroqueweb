<?php

namespace App\Models;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Panoscape\History\HasHistories;
use App\Models\Service;
use App\Models\Product;

class Location extends Model
{
    use BelongsToTenant, HasFactory, HasHistories;

    protected $fillable = [
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

        'location_type_id',
        'service_id',
        'product_id',

        'lng',
        'lat',

        'active',
        'verified',
        'status',
    ];

    public function tenant()
    {
        return $this->belongsTo(\App\Models\Tenant::class);
    }

    public function location_type()
    {
        return $this->belongsTo(LocationType::class);
    }

    public function getModelLabel()
    {
        return $this->name;
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%' . $query . '%');
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function getImagePathAttribute()
    {
        // Utilisez la logique nécessaire pour déterminer le chemin de l'image en fonction de l'id du service
        if ($this->id == 1) {
            return asset('assets/img/efuel-station-clean.png');
        } elseif ($this->id == 2) {
            return asset('assets/img/efuel-service-clean.png');
        } elseif ($this->id == 3) {
            return asset('assets/img/efuel-depot-clean.png');
        } else
            return asset('assets/img/efuel-logistic-clean.png');
    }

    public function getServices()
    {
        $serviceIds = json_decode($this->service_id);

        if (!$serviceIds) {
            return collect();
        }

        $services = Service::whereIn('id', $serviceIds)->get();

        return $services;
    }

    public function getProducts()
    {
        $productIds = json_decode($this->product_id);

        if (!$productIds) {
            return collect();
        }

        $products = Product::whereIn('id', $productIds)->get();

        return $products;
    }

    public function isOpen()
    {
        $currentTime = now(config('app.timezone'))->toTimeString();
        $this->currentTime = $currentTime;

        $opening_start = substr($this->opening_start, 0, 5);
        $opening_end = substr($this->opening_end, 0, 5);

        return $currentTime >= $opening_start && $currentTime <= $opening_end;
    }

    public function getStatus()
    {
        $statusText = '';
        $statusColor = '';

        if ($this->active == 0 && $this->verified == 1 && $this->status == 4) {
            $statusText = 'Disable Location';
            $statusColor = 'red';
        } elseif ($this->active == 0) {
            $statusText = 'Not Visible';
            $statusColor = 'red';
        } else {
            switch ($this->status) {
                case 0:
                    $statusText = 'Created / Awaiting Verification';
                    $statusColor = 'yellow';
                    break;
                case 1:
                    $statusText = 'Edited / Awaiting Verification';
                    $statusColor = 'blue';
                    break;
                case 2:
                    $statusText = 'Verified';
                    $statusColor = 'green';
                    break;

                case 3:
                    $statusText = 'Awaiting to be pushed online';
                    $statusColor = 'purple';
                    break;
                case 5:
                    $statusText = 'Not Visible';
                    $statusColor = 'red';
                    break;
                default:
                    $statusText = 'Unknown';
                    break;
            }
        }

        return [
            'text' => $statusText,
            'color' => $statusColor,
        ];
    }
}
