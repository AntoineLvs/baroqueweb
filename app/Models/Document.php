<?php

namespace App\Models;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Document extends Model
{
    use BelongsToTenant;

    protected $guarded = [];

    public function belongsToProduct()
    {
        $collection = Product::where('document_id', $this->id)->get();

        return $collection;
    }

    public function belongsToProductOffer()
    {
        $collection = ProductOffer::where('document_id', $this->id)->get();

        return $collection;
    }

    public function document_type()
    {

        return $this->belongsTo(DocumentType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function documentUrl()
    {
        //ddd (Auth::user()->tenant_id);
        //$url = url('/documents/' . Auth::user()->id . '/' . $this->filename);
        $url = url('/documents/'.Auth::user()->tenant->id.'/'.$this->filename);

        return $url;
    }

    public function document()
    {
        return $this->where('type', 'application')->first();
    }
}
