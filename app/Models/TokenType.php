<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;

class TokenType extends Model
{
    use BelongsToTenant, HasFactory;

    protected $fillable = [
        'name',
        'description',
        'marketing',
        'monthly_cost',
        'api_call_cost',
        'setup_cost',
        'contract_duration',
        'api_calls_count',
        'tax_rate',


    ];
    
    public function apiTokens()
    {
        return $this->hasMany(ApiToken::class);
    }
}
