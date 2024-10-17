<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;

class ClientType extends Model
{
    use BelongsToTenant, HasFactory;

    protected $fillable = [
        'name',
        'description',
        'updated_at',
        'created_at'
    ];


    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}
