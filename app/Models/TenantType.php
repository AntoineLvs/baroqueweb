<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TenantType extends Model
{
    protected $fillable = [
        'name',

    ];

    public function name()
    {
        return $this->name;
    }

    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }
}
