<?php

namespace App\Models\Admin;

use App\Core\Traits\SpatieLogsActivity;
use App\Http\Traits\UploadImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;


/**
 * @property mixed $order
 * @property mixed $isFree
 * @property mixed $isValid
 * @property mixed $updated_at
 * @property mixed $id
 * @property mixed $title
 * @property mixed $created_at
 * @method static where(string $string, int $int)
 */
class Soundscape extends Model
{
    use HasFactory, HasRoles, SoftDeletes, UploadImage, SpatieLogsActivity;
    protected string $guard_name = "admin";

    protected $fillable = [
        'id',
        'status',
        'order',
        'title',
        'isValid',
        'isFree',
        'track',
        'duration',
        'imgCover',
        'created_by',
        'updated_by',
        'deleted_by',
    ];


    /**
     * Author info relation to author model
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
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


}
