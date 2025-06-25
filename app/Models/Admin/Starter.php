<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Starter extends Model
{
    use SoftDeletes;
    protected string $guard_name = "admin";

    public $incrementing = false;
    protected $casts = [
        'section_id' => 'string',
    ];
    protected $keyType = 'string';

    protected $fillable = [
        'section_id',
        'content_id',
        'order',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    /**
     * Content info relation to content model
     *
     * @return BelongsTo
     */
    public function content(): BelongsTo
    {
        return $this->belongsTo(Content::class)
            ->select(['contents.id','admin_id', 'type', 'duration', 'title', 'isFree', 'isNew', 'gender', 'age', 'imgCover', 'imgShowcase'])
            ->withDefault([
            'imgShowcase' => 'storage/placeholder.jpg',
            'imgCover' => 'storage/placeholder.jpg',
        ]);
    }
}
