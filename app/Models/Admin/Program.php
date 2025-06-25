<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Program extends Model
{
    use HasFactory, HasRoles, SoftDeletes;
    protected string $guard_name = "admin";
    protected $fillable = [
        'program_id',
        'product_id',
        'author_id',
        'discounted_product_id',
        'discountRate',
        'title',
        'version',
        'information',
        'description',
        'duration',
        'partCount',
        'gains',
        'sections',
        'isFree',
        'isNew',
        'isValid',
        'isOnSale',
        'bgImageUrl',
        'coverImageUrl',
        'trailerCoverImageUrl',
        'trailerUrl',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id', 'author_id', 'author');
    }

    public function created_by(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * Author info relation to author model
     *
     * @return BelongsTo
     */
    public function updated_by(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * Author info relation to author model
     *
     * @return BelongsTo
     */
    public function deleted_by(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }


    /**
     * @return HasMany
     */
    public function product(): HasMany
    {
        return $this->hasMany(Product::class, 'program_id', 'program_id')
            ->select(['id','product_group', 'product_label', 'product_title', 'product_type', 'program_id']);
    }


    /**
     * @return HasMany
     */
    public function programSections(): HasMany
    {
        return $this->hasMany(ProgramSection::class, 'program_id', 'program_id')
            ->select(['section_id','order', 'section_title', 'program_id'])->orderBy('order');
    }


}
