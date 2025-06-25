<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class ShowcaseLayout extends Model
{
    use HasFactory, HasRoles, SoftDeletes;
    protected string $guard_name = "admin";


    protected $fillable = [
        'id',
        'category_id',
        'content_id',
        'dimension_id',
        'showcase_id',
        'category_order',

        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
