<?php

namespace App\Models\Admin;

use App\Models\Scopes\PublishedContents;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

use Laravel\Scout\Searchable;
use LaravelIdea\Helper\App\Models\Admin\_IH_Author_C;
use Spatie\Permission\Traits\HasRoles;
use App\Core\Traits\SpatieLogsActivity;
use Stevebauman\Purify\Casts\{PurifyHtmlOnGet};


/**
 * @property mixed $deletedBy_user
 * @property mixed $createdBy_user
 */
class Content extends Model
{
    use HasFactory, HasRoles, SoftDeletes, Searchable, SpatieLogsActivity;
    use \Znck\Eloquent\Traits\BelongsToThrough;
    protected string $guard_name = "admin";
    protected $dateFormat = 'Y-m-d H:i';
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    protected $casts = [
        'title' => PurifyHtmlOnGet::class,
        'description' => PurifyHtmlOnGet::class,
    ];


    protected $fillable = [
        'id',
        'status',
        'version',
        'type',
        'title',
        'description',
        'age',
        'gender',
        'isNew',
        'isFree',
        'isValid',
        'admin_id',
        'imgCover',
        'imgShowcase',

        'created_by',
        'updated_by',
        'deleted_by',

        'published_by',
        'published_at',
    ];
    protected $with = [
        'admin',
        'admin.authorInfo'
    ];
    /**
     * Get the name of the index associated with the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'contents_index';
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
            'author' => [
                'label' => $this->admin?->authorInfo?->label,
                'author_id' => $this->admin?->authorInfo?->author_id,
            ]
        ];
    }

    public function shouldBeSearchable(): bool
    {
        return $this->published_at !== null;
    }


    public function admin(): belongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function createdBy_user(): BelongsTo
    {
        return $this->belongsTo(related: Admin::class, foreignKey: 'created_by');
    }
    public function deletedBy_user(): BelongsTo
    {
        return $this->BelongsTo(related: Admin::class, foreignKey: 'deleted_by');
    }

    public function tracks(): HasMany
    {
        return $this->hasMany(Track::class);
    }
    public function moods(): HasMany
    {
        return $this->hasMany(MoodLayout::class);
    }
    public function cards(): HasMany
    {
        return $this->hasMany(Card::class);
    }

    public function TodayPool(): HasMany
    {
        return $this->hasMany(TodayPool::class);
    }

    public function getDurationAttribute($id): string
    {
        $tracks  = $this->tracks;
        $totalMin = 0;
        foreach ($tracks as $track)
        {
            if(Carbon::createFromFormat("H:i:s", $track->duration) !== false){
                $dt = Carbon::createFromFormat("H:i:s", $track->duration);
            }else{
               $dt = Carbon::createFromFormat("H:i:s", "00:01:00");
            }
            $totalMin += CarbonInterval::hour($dt->hour)->addMinutes($dt->minute)->addSeconds($dt->second)->totalMicroseconds;
        }
//        $tMinutes  = CarbonInterval::minute($totalMin)->forHumans(true);
        return CarbonInterval::microsecond($totalMin)->cascade();
    }

    /**
     * @param $contentTypes
     * @return array
     * @throws \JsonException
     */
    public function getTypeAttribute($contentTypes): array
    {
        if($contentTypes != null):
            return json_decode($contentTypes, JSON_THROW_ON_ERROR | false, 512, JSON_THROW_ON_ERROR);
        endif;
        return [];
    }

    /**
     * @param $types
     * @return string
     */
    public static function convertType($types): string
    {
        $styles = ['Course' => 'course','Single' => 'single','Podcast'  => 'podcast', 'audiobook'=>'Audio Book','Story' => 'story','Meditation' => 'meditation','Breath' => 'breath','ASMR' => 'asmr','Music' => 'music'];
        $value = "";
        foreach ($types as $type){
            $style = $styles[$type] ?? "info";
            $value .=  '<span class="'.$style.' mr-3">'.$type.'</span>';
        }
        return $value;
    }


    static public function getAuthorInfo($id): Author
    {
        $admin = Admin::findOrFail($id);
        return Author::where(['name' => $admin->first_name, 'surname' => $admin->last_name]);
    }

    public function contentAuthor()
    {
        $admin = Admin::whereId($this->admin_id)->first();

        if($admin){
            $result = Author::where(['name' => $admin->first_name, 'surname' => $admin->last_name])
                ->get(['author_id', 'label']);
        }

        return $result ?? "";
    }
    public function scopeActiveContents($query, $value)
    {
        return $query->where('status', $value);
    }

//    protected static function boot()
//    {
//        parent::boot();
//        static::addGlobalScope(new PublishedContents());
//    }
}
