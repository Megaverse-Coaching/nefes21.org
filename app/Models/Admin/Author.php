<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Znck\Eloquent\Relations\BelongsToThrough;

class Author extends Model
{
    use HasFactory, HasRoles, SoftDeletes;
    use \Znck\Eloquent\Traits\BelongsToThrough;
    protected string $guard_name = "admin";
    protected $hidden = ['created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'];

    public $primaryKey = 'author_id';
    public $incrementing = false;
    protected $fillable = [
        'author_id',
        'info',
        'label',
        'status',
        'name',
        'position',
        'surname',
        'title',
        'isConsulting',
        'headerImageUrl',
        'profilePicUrl',
        'admin_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     * Author info relation to author model
     *
     * @return BelongsTo
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }
    /**
     * Author info relation to author model
     *
     * @return BelongsTo
     */
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

    public function contents ():HasMany{
        return $this->HasMany(Content::class, 'admin_id', 'admin_id')
            ->where('status', 1);
    }

    public function scopeActiveAuthors($query)
    {
        return $query->where('status', 1);
    }
}
