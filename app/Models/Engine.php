<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'data',
        'manufacturer_id',
    ];

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
