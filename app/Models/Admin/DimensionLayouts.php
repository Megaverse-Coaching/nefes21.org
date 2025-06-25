<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Znck\Eloquent\Relations\BelongsToThrough;


class DimensionLayouts extends Model
{
    use HasFactory, HasRoles, SoftDeletes;
    use \Znck\Eloquent\Traits\BelongsToThrough;


    protected string $guard_name = "admin";

    protected $fillable = [
        'id',
        'category_id',
        'content_id',
        'dimension_id',
        'showcase_id',
        'soundscape_id',
        'category_order',

        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function contents():belongsToMany {
        return $this->belongsToMany(Content::class, DimensionLayouts::class, 'id')
            ->select(['contents.id', 'title', 'isFree', 'isValid', 'isNew', 'imgShowcase', 'imgCover'])
            ->whereNotNull('contents.published_at') // Yayınlanma tarihi olanları al
            ->where('contents.status', 1) // Sadece yayınlanmış olanları al
            ->whereNull('contents.deleted_at'); // Silinmemiş olanları al
    }


}
