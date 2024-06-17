<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;

class Invoice extends Model
{
    use BelongsToTenant, HasFactory;

    protected $fillable = [
        'tenant_id',
        'invoice_number',
        'user_id',
        'api_call_count',
        'api_call_cost',
        'monthly_cost',
        'total_bill',
        'description',
        'created_at',
        'expires_at',
        'status',
        'tax_rate',
    ];
}
