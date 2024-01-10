<?php

namespace App\Models;

use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BucketEntry extends Model
{
    use BelongsToTenant, HasFactory;

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function bucket()
    {
        return $this->belongsTo(Bucket::class);
    }

    public function ProductOffers()
    {

        // $offers = ProductOffer::where
        //  return $this->hasMany(ProductOffer::class)->withoutGlobalScope(TenantScope::class);
    }

    public function get_offer($id)
    {
        $product_offer_id = $id;
        $offer = ProductOffer::withoutGlobalScope(TenantScope::class)->find($product_offer_id);

        return $offer;
    }

    public function get_offered_products($id)
    {
        $product_offer_id = $id;
        $offer = ProductOffer::withoutGlobalScope(TenantScope::class)->find($product_offer_id);
        $products = $offer->products;

        // foreach ($products as $product){
        //   echo $product->name;}
        return $products;

    }
}
