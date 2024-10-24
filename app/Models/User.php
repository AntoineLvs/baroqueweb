<?php

namespace App\Models;

use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Panoscape\History\HasOperations;

class User extends Authenticatable implements MustVerifyEmail
{
    use BelongsToTenant, HasFactory, HasOperations, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'tenant_id',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'tenant_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * General Infos about Single Database Multi Tenant Application:
     * -> Data is segmented by tenant_id in the database (trouhg stubs when creating model)
     * -> User only sees data belonging to his tenant (thanks to global scope)
     * -> A User can only create data in his or her tenant (thanks to creating model event)
     *
     *   // Copied to Company model multi tenant putted to stub
     */

    // protected static function booted()
    // {
    //     static::addGlobalScope(new TenantScope);
    //
    //     static::creating(function($model) {
    //
    //       if (session()->has('tenant_id')) {
    //         // multi tenant important security..
    //         $model->tenant_id = session()->get('tenant_id');
    //       }
    //
    //     });
    // }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%' . $query . '%')
            ->orWhere('email', 'like', '%' . $query . '%');
    }

    public function isAdmin()
    {
        return $this->role == 'admin';
    }

    public function isSuperAdmin()
    {

        if (session()->has('tenant_id')) {
            return false;
        } else {
            return true;
        }
    }



    public function isUser()
    {
        return $this->role == 'user';
    }

    public function avatarUrl()
    {
        if ($this->photo) {
            return Storage::disk('s3-public')->url($this->photo);
        }

        return 'https://api.dicebear.com/7.x/initials/svg?seed=' . $this->name . '';
    }

    public function applicationUrl()
    {
        if ($this->application()) {
            return url('/documents/' . $this->id . '/' . $this->application()->filename);
        }

        return '#';
    }
    
    public function sepaMandate()
    {
        return $this->hasOne(SepaMandate::class, 'user_id', 'id');
    }


    public function apiTokens()
    {
        return $this->hasMany(ApiToken::class);
    }

    public function assignApiToken()
    {
        $token = bin2hex(random_bytes(32));

        $apiToken = ApiToken::create(['token' => $token]);

        $this->api_token_id = $apiToken->id;
        $this->save();
    }

    public function hasApiToken()
    {
        $apiToken = $this->apiToken();

        return !is_null($apiToken);
    }


    public function apiToken()
    {
        return ApiToken::where('tenant_id', $this->tenant_id)
            ->first();
    }

    public function userStatus($userId)
    {
        $user = User::findOrFail($userId);
        $tenantId = $user->tenant_id;
        $userWithStatus = User::where('tenant_id', $tenantId)
            ->where('status', '<>', 0)
            ->first();

        return $userWithStatus ? $userWithStatus->status : 0;
    }


    public function UserTokenType($user)
    {
        $status = $user->status;
        $tokenType = TokenType::find($status);

        return $tokenType;
    }

    public function application()
    {
        return $this->documents()->where('type', 'application')->first();
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
