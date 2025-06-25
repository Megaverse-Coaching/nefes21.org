<?php

namespace App\Models\Admin;

use App\Core\Traits\SpatieLogsActivity;
use Attribute;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use Spatie\Permission\Traits\HasRoles;


class Track extends Model
{
    use HasFactory, HasRoles, SoftDeletes, SpatieLogsActivity, Searchable;
    protected string $guard_name = "admin";

    protected $fillable = [
        'id',
        'source_id',
        'status',
        'title',
        'label',
        'link',
        'admin_id',
        'content_id',
        'soundscape_id',
        'isFree',
        'isValid',
        'track',
        'duration',
        'volume',
        'order',
        'deleted_at',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     * Get the name of the index associated with the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'tracks_index';
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray(): array
    {
        return [
            'image' => "https://nefes21.org/$this->imgCover",
            'id' => (int) $this->id,
            'title' => $this->title,
            'author' => $this->admin->name,
        ];
    }


     /**
     * Narrator info relation to user model
     *
     * @return BelongsTo
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * Content info relation to content model
     *
     * @return BelongsTo
     */
    public function content(): BelongsTo
    {
        return $this->belongsTo(Content::class);
    }
    /**
     * Content info relation to content model
     *
     * @return BelongsTo
     */
    public function soundscape(): BelongsTo
    {
        return $this->belongsTo(Soundscape::class);
    }

    /**
     * @param $link
     * @return string
     */
    public static function convertedLink($link): string
    {
        $videoId= Str::remove('.mp3',$link);
        $userInfo = "801000";
        $expire = time() + (5*60*60);
        $tokenGenerate = md5("LetheaSecretToken".$expire.$userInfo.$videoId);
        $videoiframeUrl = env('VIDEO_URL');

        return $videoiframeUrl."?videoId=".$videoId."&userInfo=".$userInfo."&token=".$tokenGenerate."&expire=".$expire;
    }
}
