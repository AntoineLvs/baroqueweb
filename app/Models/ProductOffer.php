<?php

namespace App\Models;

use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOffer extends Model
{
    use BelongsToTenant, HasFactory;

    protected $fillable = [
        'informations',
        'date_valid',
        'product_type_id',
        'total_amount',
        'price_unit',
        'tenant_id',
        'customer_tenant_id',

    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    // public function customer_tenant() {
    //   return $this->hasOne(Tenant::class)->withoutGlobalScope(TenantScope::class);
    // }

    public function products()
    {
        return $this->hasMany(OfferedProduct::class)->withoutGlobalScope(TenantScope::class);
    }

    public function product_offer_requests()
    {
        return $this->hasMany(ProductOfferRequest::class);
    }

    public function contact_person($id)
    {
        $user = User::withoutGlobalScope(TenantScope::class)->find($id);

        return $user;
    }

    public function customer_tenant($id)
    {
        $tenant = Tenant::withoutGlobalScope(TenantScope::class)->find($id);

        return $tenant;
    }

    public function getInquiry($offer_id)
    {

        $inquiry = ProductOfferInquiry::withoutGlobalScope(TenantScope::class)->where('product_offer_id', $offer_id)->get()->first();

        if ($inquiry) {
            $id = $inquiry->id;

            return $id;
        } else {
            return null;
        }

    }

    public function getProductTyp($offer)
    {

        return $this->hasOne(OfferedProduct::class)->withoutGlobalScope(TenantScope::class);
    }

    public function documents($id)
    {
        $documents = Document::where('id', $id)->get();

        return $documents;
    }

    public function getDocuments($id)
    {

        $documents = Document::where('id', $id)->get();

        return $documents;
    }

    public static function search($query)
    {

        return empty($query) ? static::query()
        : static::where('id', 'like', '%'.$query.'%')
            ->orWhere('offer_type', 'like', '%'.$query.'%')
            ->orWhere('offer_status', 'like', '%'.$query.'%')
            ->orWhere('informations', 'like', '%'.$query.'%');
    }
}
