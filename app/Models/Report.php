<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;

class Report extends Model
{
    use BelongsToTenant, HasFactory;

    protected $fillable = [
        'tenant_id',
        'users',
        'title',
        'description',
        'api_calls_count',
        'created_at',
        'expires_at',


    ];


    // public function getUsers()
    // {
    //     $userIds = json_decode($this->user_id);

    //     if (!$userIds) {
    //         return collect();
    //     }

    //     $users = User::whereIn('id', $userIds)->get();

    //     return $users;
    // }
}
