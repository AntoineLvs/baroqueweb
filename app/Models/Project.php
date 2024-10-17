<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;

class Project extends Model
{
    use BelongsToTenant, HasFactory;

    protected $fillable = [
        'tenant_id',
        'name',
        'description',
        'status',
        'client_id',
        'project_type_id',
        'updated_at',
        'created_at'
    ];


    public function tenant()
    {
        return $this->belongsTo(\App\Models\Tenant::class);
    }

    public function project_type()
    {
        return $this->belongsTo(ProjectType::class);
    }


    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
