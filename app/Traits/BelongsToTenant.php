<?php

namespace App\Traits;

use App\Models\Tenant;
use App\Scopes\TenantScope;

/**
 *  multi tenant content
 */
trait BelongsToTenant
{
    protected static function bootBelongsToTenant()
    {
        static::addGlobalScope(new TenantScope);

        static::creating(function ($model) {

            if (session()->has('tenant_id')) {
                // multi tenant important security..
                $model->tenant_id = session()->get('tenant_id');
            }

        });
    }

    public function tenant()
    {
        return $this->belongsT(Tenant::class);
    }
}
