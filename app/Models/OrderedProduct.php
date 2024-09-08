<?php

namespace App\Models;

use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderedProduct extends Model
{
    use BelongsToTenant, HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'product_quantity',
        'product_price',
        'product_tax',
        'total_amount',
        'product_unit_id'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function product_unit()
    {

        return $this->belongsTo(ProductUnit::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class)->withoutGlobalScope(TenantScope::class);
    }
}
