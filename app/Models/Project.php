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
        'active',
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


    public function getStatus()
    {
        $statusText = '';
        $statusColor = '';

        if ($this->active == 1) {
            switch ($this->status) {
                case 0:
                    $statusText = 'New';
                    $statusColor = 'emerald';
                    break;
                case 1:
                    $statusText = 'In Dev';
                    $statusColor = 'fuchsia';
                    break;
                case 2:
                    $statusText = 'Testing';
                    $statusColor = 'indigo';
                    break;
                case 3:
                    $statusText = 'Approved';
                    $statusColor = 'green';
                    break;
                default:
                    $statusText = 'Unknown';
                    break;
            }
            return [
                'text' => $statusText,
                'color' => $statusColor,
            ];
        } else {
            return [
                'text' => 'Disabled',
                'color' => 'red',
            ];
        }
    }
}
