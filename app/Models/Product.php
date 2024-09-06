<?php

namespace App\Models;

use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use BelongsToTenant, HasFactory, SoftDeletes;

    protected $fillable = [
      'name',
      'data',
      'base_product_id',
      'product_type_id',
      'product_unit_id',
      'standard_id',
      'product_price',
      'blend_percent',
      'document_id',

      'tenant_id',

    ];

    public function tenant()
    {
      return $this->belongsTo(Tenant::class);
    }

    public function product_type()
    {

      return $this->belongsTo(ProductType::class);
    }

    public function standard()
    {

      return $this->belongsTo(Standard::class);
    }


    public function base_product()
    {
        return $this->belongsTo(BaseProduct::class);
      //return BaseProduct::withoutGlobalScope(TenantScope::class)->where('id', $id)->get()->first();
    }



    public function product_unit()
    {

      return $this->belongsTo(ProductUnit::class);
    }

    public function offers()
    {
      return $this->hasMany(ProductOffer::class);
    }

    public function documents()
    {
      return $this->hasMany(Document::class, 'product_id');
    }


    public function getDocuments()
    {
        $documentIds = $this->document_id;

        if (!$documentIds) {
            return collect();
        }

        $documents = Document::where('id', $documentIds)->get();

        return $documents;
    }


    public function location()
    {
      return $this->belongsTo(Location::class);
    }

    public function getImagePathAttribute()
    {
      // Utilisez la logique nécessaire pour déterminer le chemin de l'image en fonction de l'id du service
      if ($this->id == 1) {
        return asset('assets/img/hvo.png');
      } elseif ($this->id == 2) {
        return asset('assets/img/efuel1.png');
      } elseif ($this->id == 3) {
        return asset('assets/img/btl.png');
      } elseif ($this->id == 4) {
        return asset('assets/img/gtl.png');
      } elseif ($this->id == 5) {
        return asset('assets/img/xtl.png');
      } else
        return asset('assets/img/gtl.png');
    }
}
