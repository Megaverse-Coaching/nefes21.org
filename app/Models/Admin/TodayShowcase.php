<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class TodayShowcase extends Model
{
    use SoftDeletes;
    protected string $guard_name = "admin";

    protected $hidden = ['created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'id',
        'action',
        'actionUrl',
        'content_id',
        'priority',
        'imageUrl',
        'isFree',
        'isValid',
        'showcase_id',
        'imgShowcase',

        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $attributes = [
        'priority' => 0,
    ];
    /**
     * Content info relation to content model
     *
     * @return belongsTo
     */
    public function content(): belongsTo
    {
        return $this->belongsTo(Content::class)
            ->select('contents.id','admin_id', 'type', 'title', 'description','duration', 'isFree', 'isValid', 'isNew', 'gender', 'age', 'imgCover', 'imgShowcase', 'imgCover')
            ->whereHas('admin')
            //->withDefault(['title' => "Canlı Yayın",'imgShowcase' => 'storage/live-background.webp','imgCover' => 'storage/live-background.webp',])
        ;
    }
    /**
     * Content info relation to content model
     *
     * @return HasOne
     */
    public function showcase(): HasOne
    {
        return $this->HasOne(Showcase::class, 'showcase', 'showcase_id')
            ->select('showcase', 'title');
    }

    public function author():hasManyThrough {
        return $this->hasManyThrough(
            Content::class,
            Admin::class,
        );
    }
}
