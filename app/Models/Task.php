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
        'priority',
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

    public function getStatus()
    {
        $statusText = '';
        $statusColor = '';


        switch ($this->status) {
            case 0:
                $statusText = 'To Do';
                $statusColor = 'emerald';
                break;
            case 1:
                $statusText = 'In Dev';
                $statusColor = 'fuchsia';
                break;
            case 2:
                $statusText = 'To Test';
                $statusColor = 'indigo';
                break;
            case 3:
                $statusText = 'To Redo';
                $statusColor = 'red';
                break;
            case 4:
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
    }
}
