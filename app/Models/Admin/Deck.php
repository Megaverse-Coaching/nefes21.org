<?php

namespace App\Models\Admin;

use App\Core\Traits\SpatieLogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\CreatedUpdatedBy;
use App\Http\Traits\UploadImage;
use Spatie\Permission\Traits\HasRoles;


class Deck extends Model
{

    use HasFactory, HasRoles, SoftDeletes, UploadImage, SpatieLogsActivity;
    protected string $guard_name = "admin";

    protected $fillable = [
        'id',
        'status',
        'order',
        'title',
        'tag',
        'color',
        'isValid',
        'showcase',
        'front',
        'back',
        'background',

        'created_by',
        'updated_by',
        'published_by',
        'deleted_by',

        'created_at',
        'updated_at',
        'published_at',
        'deleted_at',
    ];



    /**
     * Narrator info relation to user model
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->BelongsTo(Admin::class);
    }

    /**
     * Author info relation to author model
     *
     * @return BelongsTo
     */
    public function created_by_user(): BelongsTo
    {
        return $this->BelongsTo(related: Admin::class, foreignKey: 'created_by');
    }

    /**
     * Author info relation to author model
     *
     * @return BelongsTo
     */
    public function updated_user(): BelongsTo
    {
        return $this->BelongsTo(related: Admin::class, foreignKey: 'updated_by');
    }

    /**
     * Author info relation to author model
     *
     * @return BelongsTo
     */
    public function deleted_user(): BelongsTo
    {
        return $this->BelongsTo(related: Admin::class, foreignKey: 'deleted_by');
    }

    public function cards(): HasMany
    {
        return $this->hasMany(Card::class);
    }
}
