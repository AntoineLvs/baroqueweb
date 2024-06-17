<?php

namespace App\Models;

use App\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Tenant extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $fillable = [
    //     'tenant_name',
    // ];

    protected $fillable = [
        'name',
        'email',
        'tenant_type_id',

    ];

    public static function search($query)
    {

        return empty($query) ? static::query()
            : static::where('name', 'like', '%' . $query . '%')
            ->orWhere('email', 'like', '%' . $query . '%');
    }

    public function users()
    {
        // return $this->hasOne('App\Models\User');
        return $this->hasMany(User::class);
    }

    // public function tenant_type() {
    //     //return $this->belongsTo('App\Models\ProductType');
    //     return $this->belongsTo(TenantType::class);
    // }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function products()
    {

        return $this->hasMany(Product::class);
    }

    public function offeredProducts()
    {

        return $this->hasMany(OfferedProduct::class);
    }

    public function productOffers()
    {

        return $this->hasMany(ProductOffer::class);
    }

    public function projects()
    {

        return $this->hasMany(Project::class);
    }

    public function locations()
    {

        return $this->hasMany(Location::class);
    }

    public function bucket()
    {

        return $this->belongsTo(Bucket::class);
    }

    public function bucket_entries()
    {

        return $this->hasMany(BucketEntry::class);
    }
    public function sepaMandate()
    {
        return $this->hasOne(SepaMandate::class, 'tenant_id', 'id');
    }

    public function tenant_type()
    {

        return $this->belongsTo(TenantType::class, 'tenant_type_id');
    }

    public function photo()
    {
        if ($this->photo) {
            // return Storage::disk('local')->url($this->photo);
        }

        return 'https://avatars.dicebear.com/api/initials/' . $this->name . '.svg';
    }

    public function photoUrl($tenant)
    {
        $filename = $tenant->photo;

        $url = url('/photos/' . $tenant->id . '/' . $filename);

        //$url = url('/photos/' . Auth::user()->tenant->id . '/' . $filename);
        return $url;
    }

    public function photoHeaderUrl($tenant)
    {
        $filename = $tenant->photo_header;

        $url = url('/photos/' . $tenant->id . '/' . $filename);

        // $url = url('/photos/' . Auth::user()->tenant->id . '/' . $filename);
        return $url;
    }

    public function avatarUrl($tenant)
    {

        $tenant = $tenant;

        if ($this->photo) {

            return Storage::disk('s3')->url($this->photo);
            // return asset('storage/'. auth()->user()->Tenant->photo );
            //  return asset('storage/'. $tenant->photo );
        }

        return 'https://avatars.dicebear.com/api/initials/' . $this->name . '.svg';
    }

    public function initials()
    {

        return 'https://avatars.dicebear.com/api/initials/' . $this->name . '.svg';
    }

    public function getProductNumber($tenant)
    {
        $count = Product::withoutGlobalScope(TenantScope::class)->where('tenant_id', '=', $tenant->id)->count();

        return $count;
    }

    public function getProjectNumber(Tenant $tenant)
    {
        $count = Project::withoutGlobalScope(TenantScope::class)->where('tenant_id', '=', $tenant->id)->count();

        return $count;
    }

    public function getLocationNumber(Tenant $tenant)
    {
        $count = Location::withoutGlobalScope(TenantScope::class)->where('tenant_id', '=', $tenant->id)->count();

        return $count;
    }

    public function getOfferNumber(Tenant $tenant)
    {
        $count = ProductOffer::withoutGlobalScope(TenantScope::class)->where('tenant_id', '=', $tenant->id)->count();

        return $count;
    }

    public function apiTokens()
    {
        return $this->hasMany(ApiToken::class);
    }

    public function hasApiLicense(Tenant $tenant)
    {

        $count = ApiToken::where('tenant_id', '=', $tenant->id)->count();

        return $count;
    }
}
