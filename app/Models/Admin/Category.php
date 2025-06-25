<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Category extends Model
{
    use HasFactory, HasRoles, SoftDeletes;
    use \Znck\Eloquent\Traits\BelongsToThrough;

    protected string $guard_name = "admin";

    public $incrementing = false;
    protected $casts = [
        'id' => 'string',
        'category' => 'string',
    ];
    protected $keyType = 'string';
    public $primaryKey = 'category';
    protected $fillable = [
        'category',
        'dimension_id',
        'status',
        'order',
        'title',
        'description',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


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

    public function layouts(): HasMany
    {
        return $this->hasMany(DimensionLayouts::class, 'category_id', 'category')
            ->orderBy('category_order');
    }

    /**
     * @return HasMany
     */
    public function limitedLayouts(): hasMany
    {
        return $this->hasMany(DimensionLayouts::class, 'category_id', 'category')
            ->orderBy('category_order');
    }
}
