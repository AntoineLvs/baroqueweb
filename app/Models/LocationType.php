<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationType extends Model
{
    public function project()
    {
        return $this->hasMany(Project::class);
    }
}
