<?php

namespace App\Models;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use BelongsToTenant, HasFactory;

    protected $fillable = [
        'name',
        'data',
        'project_type_id',

    ];

    public function tenant()
    {
        return $this->belongsTo(\App\Models\Tenant::class);
    }

    public function project_type()
    {
        //return $this->belongsTo('App\Models\ProductType');
        return $this->belongsTo(ProjectType::class);
    }
}
