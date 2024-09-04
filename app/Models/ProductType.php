<?php

namespace App\Models;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{

    protected $fillable = [
        'name',

    ];


    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function standard()
    {
        return $this->hasMany(Product::class);
    }

    public function base_product()
    {
        return $this->hasMany(Product::class);
    }

    public function getImagePathAttribute()
    {
        // Utilisez la logique nécessaire pour déterminer le chemin de l'image en fonction de l'id du service
        if ($this->id == 1) {
            return asset('assets/img/hvo.png');
        } elseif ($this->id == 2) {
            return asset('assets/img/efuel1.png');
        } elseif ($this->id == 3) {
            return asset('assets/img/btl.png');
        } elseif ($this->id == 4) {
            return asset('assets/img/gtl.png');
        } elseif ($this->id == 5) {
            return asset('assets/img/xtl.png');
        } elseif ($this->id == 6) {
            return asset('assets/img/xtl.png');
        } else
            return asset('assets/img/hvo.png');
    }
}
