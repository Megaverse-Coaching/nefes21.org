<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeckLayout extends Model
{
    use SoftDeletes;
    protected string $guard_name = "admin";


    protected $fillable = [
        'card_id',
        'deck_id',
        'content_id',
        'title',
        'description',
        'daily',

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
            DeckLayout::class,
            'id',
        )->select(['contents.id', 'contents.title', 'isFree', 'isValid', 'isNew']);
    }

    /**
     * Narrator info relation to user model
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->BelongsTo(Admin::class);
    }
    /**
     * Author info relation to author model
     *
     * @return BelongsTo
     */
    public function created_by_user(): BelongsTo
    {
        return $this->BelongsTo(related: Admin::class, foreignKey: 'created_by');
    }

    /**
     * Author info relation to author model
     *
     * @return BelongsTo
     */
    public function updated_user(): BelongsTo
    {
        return $this->BelongsTo(related: Admin::class, foreignKey: 'updated_by');
    }

    /**
     * Author info relation to author model
     *
     * @return BelongsTo
     */
    public function deleted_user(): BelongsTo
    {
        return $this->BelongsTo(related: Admin::class, foreignKey: 'deleted_by');
    }

    /**
     * Content info relation to content model
     *
     * @return BelongsTo
     */
    public function deck(): BelongsTo
    {
        return $this->belongsTo(Deck::class);
    }

    public function cardDetail(): BelongsTo
    {
        return $this->belongsTo(Deck::class, 'deck_id')
            ->select(['decks.id', 'decks.title', 'tag', 'color', 'showcase', 'front', 'back', 'background'])
            ->orderBy('order');
    }
    public function contentDetail(): BelongsTo
    {
        return $this->belongsTo(Content::class, 'content_id')
            ->select(['contents.id','admin_id' ,'contents.title', 'contents.description', 'isNew', 'isFree', 'imgCover', 'gender', 'age', 'duration', 'type']);
    }


}
