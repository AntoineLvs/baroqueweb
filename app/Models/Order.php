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
        'tenant_id',
        'to_tenant_id',
        'order_status_id',
        'order_type_id',
        'product_type_id',


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


    protected static function booted()
    {
        static::addGlobalScope(new TenantScope());
    }

    // Diese Methode wird vom TenantScope aufgerufen, um die spezifischen Regeln zu bestimmen
    public function tenantAccessible($query, $tenantId)
    {
        // Beispiel: Erlaube Zugriff, wenn der Tenant entweder der Ersteller oder der Empfänger der Order ist
        $query->where('tenant_id', '=', $tenantId)
            ->orWhere('to_tenant_id', '=', $tenantId);
    }

    public function orderedProductsForRecipient()
    {
        // Hier deaktivieren wir den TenantScope für OrderedProduct
        return OrderedProduct::withoutGlobalScope(TenantScope::class)
            ->where('order_id', $this->id)
            ->get();
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function toTenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id');
    }

    public function type()
    {
        return $this->belongsTo(OrderType::class, 'order_type_id');
    }



    public function orderedProducts()
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
