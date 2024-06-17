<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;

class ApiToken extends Model
{
    use BelongsToTenant, HasFactory;

    protected $fillable = [
        'token',
        'user_id',
        'tenant_id',
        'token_type_id',
        'api_calls_count',
        'expires_at',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function tokenType()
    {
        return $this->belongsTo(TokenType::class, 'token_type_id')->withoutGlobalScope(TenantScope::class);
    }
}
