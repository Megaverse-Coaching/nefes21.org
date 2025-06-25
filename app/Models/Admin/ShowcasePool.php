<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShowcasePool extends Model
{
    use SoftDeletes;
    protected string $guard_name = "admin";


    protected $fillable = [
        'dimension_id',
        'content_id',

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
            ShowcasePool::class,
            'id',
            'content_id',
        )->select(['contents.title', 'isFree', 'isValid', 'isNew', 'imgShowcase']);
    }

}
