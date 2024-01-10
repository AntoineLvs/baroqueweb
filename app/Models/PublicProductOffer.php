<?php

namespace App\Models;

use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicProductOffer extends Model
{
    use BelongsToTenant, HasFactory;

    protected $fillable = [
        'informations',
        'date_valid',
        'product_type_id',
        'total_amount',
        'price_unit',
        'tenant_id',

    ];

    public function products()
    {
        return $this->hasMany(PublicOfferedProduct::class)->withoutGlobalScope(TenantScope::class);
    }

    public function product_offer_inquries()
    {
        return $this->hasMany(ProductOfferInquiry::class);
    }

    public function contact_person($id)
    {
        $user = User::withoutGlobalScope(TenantScope::class)->find($id);

        return $user;
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

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
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
