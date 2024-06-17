<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;

class SepaMandate extends Model
{
    use BelongsToTenant, HasFactory;

    protected $fillable = [
        'description',
        'user_id',
        'tenant_id',
        'creditor_informations',
        'mandate_reference',
        'mandate_type',
        'payer_name',
        'payer_address',
        'payer_iban',
        'payer_bic',
        'payer_bank',
        'payment_type',
        'grant_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
