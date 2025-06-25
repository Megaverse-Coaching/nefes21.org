<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class SectionPart extends Model
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
        'soundscape_id',
        'program_id',
        'order',
        'duration',
        'part_id',
        'isValid',
        'label',
        'title',
        'type',
        'version',
        'quest_description',
        'quest_information',
        'quest_title',
        'soundscape_volume',
        'part_video',
        'part_audio',
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

}
