<?php

namespace App\Models;

use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;

class ProductOfferInquiry extends Model
{
    use BelongsToTenant;

    protected $fillable = [

        'tenant_id',
        'product_offer_id',

    ];

    // public function products() {
    //   return $this->hasMany(PublicOfferedProduct::class)->withoutGlobalScope(TenantScope::class);
    // }

    // public function offer() {
    //   return $this->belongsTo(ProductOffer::class);
    // }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function offer($offer_id)
    {
        $offer = PublicProductOffer::withoutGlobalScope(TenantScope::class)->find($offer_id);

        return $offer;
    }

    public function supplier($id)
    {

        $supplier = Tenant::find($id);

        return $supplier;
    }

    public function product_type()
    {

        return $this->belongsTo(ProductType::class);
    }

    public static function search($query)
    {

        return empty($query) ? static::query()
        : static::where('id', 'like', '%'.$query.'%')
            ->orWhere('offer_type', 'like', '%'.$query.'%');
    }
}
