<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderType extends Model
{



    public function order()
    {
      return $this->hasMany(Order::class);
    }

}
