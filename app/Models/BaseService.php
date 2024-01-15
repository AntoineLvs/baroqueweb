<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;

class BaseService extends Model
{
  use BelongsToTenant, HasFactory;
  protected $fillable = [
    'name',
    'description',
    'id',

  ];


  public function service()
  {
    return $this->hasMany('App\Models\Service');
  }
}
