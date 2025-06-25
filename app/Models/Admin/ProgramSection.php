<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class ProgramSection extends Model
{
    use HasFactory, HasRoles, SoftDeletes;
    protected string $guard_name = "admin";

    public $incrementing = false;
    protected $casts = [
        'id' => 'string',
    ];
    protected $keyType = 'string';

    protected $fillable = [
        'section_id',
        'order',
        'program_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     * @return HasMany
     */
    public function program(): HasMany
    {
        return $this->hasMany(Program::class, 'program_id', 'program_id')
            ->select(['id','product_group', 'product_label', 'product_title', 'product_type', 'program_id']);
    }

    /**
     * @return HasMany
     */
    public function sections(): HasMany
    {
        return $this->hasMany(ProgramSection::class, 'section_id', 'section_id')
            ->select(['program_sections'.'section_id','program_sections'.'order', 'program_sections'.'section_title', 'program_sections'.'program_id']);
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
    public function parts(): HasMany
    {
        return $this->hasMany(SectionPart::class, 'section_id', 'section_id')
            ->select(['section_id','order','section_parts.title','section_parts.label', 'part_id', 'type', 'isValid'])->orderBy('order');
    }

}
