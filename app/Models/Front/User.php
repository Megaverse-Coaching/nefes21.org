<?php

namespace App\Models\Front;

use App\Core\Traits\SpatieLogsActivity;
use Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\{HasMany,HasOne};

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Support\Carbon;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Front\UserInfo;


class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, SpatieLogsActivity, HasRoles, SoftDeletes;


    protected string $guard = "web";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'api_token',
        'password',
    ];
//    protected $with = [
//        'permissions',
//        'roles'
//    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRememberToken(): ?string
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }
    public function getAuthRoleAttribute(): bool|\Illuminate\Support\Collection
    {
        return !Auth::check() ?? Auth::user()->roles()->get(['id', 'name']);
    }
    /**
     * @return false|\Illuminate\Support\Collection
     */
    public function getRoleNameAttribute(): bool|\Illuminate\Support\Collection
    {
        return !Auth::check() ?? $this->getRoleNames();
    }
    /**
     * Get a fullname combination of first_name and last_name
     *
     * @return string
     */
    public function getNameAttribute(): string
    {
        return "$this->first_name $this->last_name";
    }
    public function getUserFullName($id): mixed
    {
        return self::find($id)->get('id');
    }
    /**
     * Prepare proper error handling for url attribute
     *
     * @return string
     */
    public function getAvatarUrlAttribute(): string
    {
        if ($this->info) {
            return asset($this->info->avatar_url);
        }

        return asset(theme()->getMediaUrlPath() . 'avatars/blank.png');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getPermissionAttribute(): \Illuminate\Support\Collection
    {
        return $this->getAllPermissions();
    }
    /**
     * User relation to info model
     *
     * @return HasOne
     */
    public function info(): HasOne
    {
        return $this->hasOne(UserInfo::class);
    }
}
