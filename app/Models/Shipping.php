<?php

namespace App\Models;

use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use BelongsToTenant, HasFactory;

    protected $fillable = [
        # Order values
        'tenant_id',
        'from_tenant_id',
        'to_tenant_id',
        'shipper_tenant_id',
        'shipping_status_id',


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
        'order_notice',

        # General fields
        'shipping_notice',
        'date_of_shipping',
        'date_customer_sent',
        'date_customer_confirmed',
        'date_customer_cancelled',
        'shipping_notice',
    ];

    protected $casts = [
        'date_of_shipping' => 'datetime',
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


    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function toTenant()
    {
        return $this->belongsTo(Tenant::class, 'to_tenant_id');
    }

    public function fromTenant()
    {
        return $this->belongsTo(Tenant::class, 'from_tenant_id');
    }

    public function shippingTenant()
    {
        return $this->belongsTo(Tenant::class, 'shipper_tenant_id');
    }

    public function status()
    {
        return $this->belongsTo(ShippingStatus::class, 'shipping_status_id');
    }



}
