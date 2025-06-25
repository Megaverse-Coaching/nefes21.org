<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TodayPool extends Model
{
    use SoftDeletes;
    protected string $guard_name = "admin";


    protected $fillable = [
        'section_id',
        'content_id',
        'dimension_id',

        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function content(): BelongsToMany
    {
        return $this->belongsToMany(
            Content::class,
            TodayPool::class,
            'id',
            'content_id',
        )->select(['contents.id', 'title', 'type','isFree', 'isValid', 'isNew', 'imgCover', 'imgShowcase']);
    }
    public function contentDetail(): BelongsTo
    {
        return $this->belongsTo(Content::class, 'content_id')
            ->select(['contents.id','admin_id' ,'contents.title', 'contents.description', 'isNew', 'isFree', 'imgCover', 'gender', 'age', 'duration', 'type']);
    }
}
