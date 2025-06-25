<?php

namespace App\Models\Admin;

use App\Core\Traits\SpatieLogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Card extends Model
{
    use HasFactory, HasRoles, SoftDeletes, SpatieLogsActivity;
    protected string $guard_name = "admin";


    protected $fillable = [
        'status',
        'order',
        'title',
        'description',

        'deck_id',
        'content_id',

        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

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

    public function content(): BelongsToMany
    {
        return $this->belongsToMany(
            Content::class,
            DeckLayout::class,
            'id',
        )->select(['contents.id', 'contents.title', 'isFree', 'isValid', 'isNew']);
    }

}
