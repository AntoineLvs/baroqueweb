<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;

class MapboxRecord extends Model
{
    use BelongsToTenant, HasFactory;

    protected $fillable = [
        'id',
        'queue',
        'payload',
        'attempts',
        'reserved_at',
        'available_at',
        'created_at',
    ];


    public static function getLocations()
    {
        return self::all()->pluck('payload')
            ->map(function ($payload) {
                // Déboguer la valeur du payload
                preg_match('/;i:(\d+);/', $payload, $matches);
                return isset($matches[1]) ? (int) $matches[1] : null;
            })->filter()->toArray();
    }
}
