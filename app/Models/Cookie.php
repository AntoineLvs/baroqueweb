<?php

namespace App\Models;

use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Justijndepover\CookieConsent\Concerns\InteractsWithCookies;

class Cookie extends Model
{
    use InteractsWithCookies; // add this line



}

