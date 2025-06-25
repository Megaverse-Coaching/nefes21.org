<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class MoodLayout extends Model
{
    use HasFactory, HasRoles, SoftDeletes;
    protected string $guard_name = "admin";

    protected $fillable = [
        'mood_id',
        'content_id',

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
        return $this->belongsTo(Content::class)->withDefault([
            'imgShowcase' => 'storage/placeholder.jpg',
            'imgCover' => 'storage/placeholder.jpg',
        ]);
    }
}
