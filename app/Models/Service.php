<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;

class Service extends Model
{
  use BelongsToTenant, HasFactory;
  protected $fillable = [
    'name',
    'description',
    'active',
    'base_service_id',

    'tenant_id',


  ];

  public function location()
  {
    return $this->belongsToMany(Location::class);
  }
  public function base_service($id)
  {
    return BaseService::withoutGlobalScope(TenantScope::class)->where('id', $id)->get()->first();
  }

  public function getImagePathAttribute()
  {
    // Utilisez la logique nécessaire pour déterminer le chemin de l'image en fonction de l'id du service
    if ($this->id == 1) {
      return asset('assets/img/efuel-station-clean.png');
    } elseif ($this->id == 2) {
      return asset('assets/img/efuel-service-clean.png');
    } elseif ($this->id == 3) {
      return asset('assets/img/efuel-depot-clean.png');
    } else
    return asset('assets/img/efuel-logistic-clean.png');
  }
}
