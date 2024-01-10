<?php

namespace App\Models;

// use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;

class BaseProduct extends Model
{
    protected $fillable = [
        'id',
        'name',
        'data',
        'product_type_id',
        'blend_percent',

    ];

    public function product_type()
    {

        return $this->belongsTo(ProductType::class);
    }

    public function getImagePathAttribute()
  {
    if ($this->product_type_id == 1) {
      return asset('assets/img/hvo.png');
    } elseif ($this->product_type_id == 2) {
      return asset('assets/img/efuel1.png');
    } elseif ($this->product_type_id == 3) {
      return asset('assets/img/btl.png');
    } else
      return asset('assets/img/gtl.png');
  }
}
