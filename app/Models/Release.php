<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
    use HasFactory;

    protected $fillable = [
        'info',
        'standard_id',
        'engine_id',
        'manufacturer_id',
        'release_from',
    ];

    public function engine()
    {
        return $this->belongsTo(Engine::class);
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }


    public function standard()
    {
        return $this->belongsTo(Standard::class);
    }
}
