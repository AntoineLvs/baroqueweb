<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;

class Client extends Model
{
    use BelongsToTenant, HasFactory;

    protected $fillable = [
        'tenant_id',
        'name',
        'description',
        'status',
        'client_type_id',
        'updated_at',
        'created_at'
    ];


    public function tenant()
    {
        return $this->belongsTo(\App\Models\Tenant::class);
    }

    public function client_type()
    {
        return $this->belongsTo(ClientType::class);
    }

    public function getStatus()
    {
        $statusText = '';
        $statusColor = '';


        switch ($this->status) {
            case 0:
                $statusText = 'Discussion';
                $statusColor = 'emerald';
                break;
            case 1:
                $statusText = 'Maquette';
                $statusColor = 'fuchsia';
                break;
            case 2:
                $statusText = 'Developpement';
                $statusColor = 'indigo';
                break;
            case 3:
                $statusText = 'Test';
                $statusColor = 'yellow';
                break;
            case 6:
                $statusText = 'Approuvé';
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
