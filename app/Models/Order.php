<?php

namespace App\Models;

use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use BelongsToTenant, HasFactory;

    protected $fillable = [
        # Order values
        'order_status_id',
        'order_type_id',
        'product_type_id',
        'tenant_id',

        # Customer values
        'customer_tenant_id',
        'customer_company_name',
        'customer_email',
        'customer_phone',
        'customer_contact_firstname',
        'customer_contact_lastname',
        'customer_street',
        'customer_zip',
        'customer_city',
        'customer_country',
        'customer_order_notice',

        # General fields
        'order_notice',
        'date_valid',
        'total_amount',
        'price_unit',
        'date_customer_sent',
        'date_customer_confirmed',
        'date_customer_cancelled'
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id');
    }

    public function type()
    {
        return $this->hasOne(OrderType::class);
    }



    public function products()
    {
        return $this->hasMany(OrderedProduct::class);
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

    public function getProductTyp($offer)
    {

        return $this->hasOne(OrderedProduct::class)->withoutGlobalScope(TenantScope::class);
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
