<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;

class Task extends Model
{
    use BelongsToTenant, HasFactory;

    protected $fillable = [
        'tenant_id',
        'name',
        'description',
        'status',
        'project_id',
        'timer',
        'updated_at',
        'created_at',
    ];


    public function tenant()
    {
        return $this->belongsTo(\App\Models\Tenant::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
