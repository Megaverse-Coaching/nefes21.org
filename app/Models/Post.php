<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Content extends Model
{
    use Searchable;

    protected $fillable = ['title', 'content', 'published_at'];

    // Arama dizinine veri aktarılması için koşulların belirlenmesi
    public function shouldBeSearchable()
    {
        return $this->status == 1 && $this->published_at != null;
    }
}
