<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Mood extends Model
{
    use HasFactory, HasRoles, SoftDeletes;
    protected string $guard_name = "admin";

    public $incrementing = false;
    protected $casts = [
        'id' => 'string',
        'mood_id' => 'string',
    ];
    protected $keyType = 'string';
    public $primaryKey = 'mood_id';
    protected $fillable = [
        'mood_id',
        'status',
        'title',

        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
