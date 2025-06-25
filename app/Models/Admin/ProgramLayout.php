<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class ProgramLayout extends Model
{
    use HasFactory, HasRoles, SoftDeletes;
    protected string $guard_name = "admin";
    protected $fillable = [
        'program_id',
        'isDiscounted',
        'label_id',
        'order',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     * Author info relation to author model
     *
     * @return BelongsTo
     */
    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
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
}
