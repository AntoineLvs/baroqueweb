<?php

namespace App\Models;

use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bucket extends Model
{
    use BelongsToTenant, HasFactory;

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function offers()
    {
        return $this->hasMany(ProductOffer::class);
    }

    public function products()
    {
        return $this->hasMany(OfferedProduct::class)->withoutGlobalScope(TenantScope::class);
    }
}
