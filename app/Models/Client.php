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
        'active',
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

        if ($this->active == 1) {
            switch ($this->status) {
                case 0:
                    $statusText = 'Discussion';
                    $statusColor = 'yellow';
                    break;
                case 1:
                    $statusText = 'Working for';
                    $statusColor = 'indigo';
                    break;
                case 2:
                    $statusText = 'Done';
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
