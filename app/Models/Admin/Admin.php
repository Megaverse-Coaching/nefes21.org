<?php

namespace App\Models\Admin;

use Auth;
use App\Core\Traits\SpatieLogsActivity;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Mail\Attachable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany, HasOne};
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\{DatabaseNotification, DatabaseNotificationCollection, Notifiable};
use Illuminate\Mail\Attachment;
use Illuminate\Support\Carbon;

use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin\AdminInfo;


/**
 * @property mixed $first_name
 * @property mixed $last_name
 */
class Admin extends Authenticatable implements MustVerifyEmail, Attachable
{
    use HasFactory, Notifiable;
    use SpatieLogsActivity;
    use HasRoles;
    use SoftDeletes;

    public $image = "demo1/media/logos/mail.png";

    public function toMailAttachment(): Attachment
    {
        return Attachable::fromPath(public_path($this->image));
    }

    protected string $guard_name = "admin";
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
    protected $with = [
        'permissions',
        'roles',
        'authorInfo'
    ];
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
        return $this->hasOne(AdminInfo::class, 'admin_id');
    }

    public function content(): HasMany
    {
        return $this->hasMany(Content::class);
    }

    public function tracks(): HasMany
    {
        return $this->hasMany(Track::class);
    }

    public function soundscape(): HasMany
    {
        return $this->hasMany(Soundscape::class);
    }

    public function saveQuietly(array $options = [])
    {
        return static::withoutEvents(function () use ($options) {
            return $this->save($options);
        });
    }

    /**
     * The guard for `laravel-permissions` to use.
     *
     * Patching `Spatie\Permission\Guard` because it's not picking up Laravel's default.
     *
     * @return string
     */
    public function guardName(): string
    {
        return 'admin';
    }

    public function authorInfo(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'id', 'admin_id');
    }
}
