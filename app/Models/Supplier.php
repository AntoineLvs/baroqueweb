<?php

namespace App\Models;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use BelongsToTenant, HasFactory;

    //  use SoftDeletes;

    // 'name', 'email', 'phone', 'document_type', 'document_id'
    protected $fillable = [
        'name', 'email',
    ];

    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class);
    }
}
