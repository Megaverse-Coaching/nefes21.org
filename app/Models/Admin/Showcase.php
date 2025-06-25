<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Showcase extends Model
{
    use SoftDeletes;
    protected string $guard_name = "admin";

    protected $hidden = ['created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'];
    public $incrementing = false;
    protected $casts = [
        'id' => 'string',
    ];
    protected $keyType = 'string';

    protected $fillable = [
        'id',
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
