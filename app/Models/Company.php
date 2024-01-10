<?php

namespace App\Models;

use App\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'name', 'email', 'phone', 'address',
    ];

    protected static function booted()
    {
        static::addGlobalScope(new TenantScope);

        static::creating(function ($company) {

            if (session()->has('tenant_id')) {
                // multi tenant important security..
                $company->tenant_id = session()->get('tenant_id');
            }

        });
    }
}
