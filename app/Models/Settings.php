<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;

class Settings extends Model
{
    use BelongsToTenant, HasFactory;

    protected $fillable = [
        'invoice_number_prefix',


    ];

}
