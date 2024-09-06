<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderType extends Model
{
    protected $table = 'order_types';

    protected $fillable = [
        'name',
    ];


    public function order()
    {
      return $this->belongsToMany(Order::class);
    }

}
