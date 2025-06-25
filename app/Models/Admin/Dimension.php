<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Staudenmeir\EloquentHasManyDeep\HasManyDeep;
use Znck\Eloquent\Relations\BelongsToThrough;


class Dimension extends Model
{
    use HasFactory, HasRoles, SoftDeletes;
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;
    use \Znck\Eloquent\Traits\BelongsToThrough;

    protected string $guard_name = "admin";

    public $incrementing = false;
    protected $casts = [
        'id' => 'string',
    ];
    protected $keyType = 'string';

    protected $fillable = [
        'id',
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


    public function categories(): HasMany
    {
        return $this->hasMany(Category::class, 'dimension_id', 'dimension');
    }


    public function getTodayPool(): hasMany
    {
        return $this->hasMany(TodayPool::class, 'dimension_id', 'dimension');
    }

    public function getShowcasePool(): hasMany
    {
        return $this->hasMany(ShowcasePool::class, 'dimension_id', 'dimension');
    }

    public function getContents(): BelongsToThrough
    {
        return $this->belongsToThrough(
            Category::class,
            DimensionLayouts::class,
            'dimension',
            '',
        );

        /*
        return $this->hasManyThrough(
            Category::class,
            DimensionLayouts::class,
            'dimension_id',
            'category',
            'dimension',
            'category_id'
        );
        */
    }




}
