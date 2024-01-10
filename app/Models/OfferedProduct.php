<?php

namespace App\Models;

use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferedProduct extends Model
{
    use BelongsToTenant, HasFactory;

    protected $fillable = [
        'name',
        'data',
        'product_id',
        //'product_type_id',
        'price',
        'price_unit',
        'tenant_id',

    ];

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

    public function offer()
    {
        return $this->belongsTo(ProductOffer::class);
    }
}
