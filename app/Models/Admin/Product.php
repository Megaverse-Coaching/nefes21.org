<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Product extends Model
{
    use HasFactory, HasRoles, SoftDeletes;
    protected string $guard_name = "admin";

    protected $fillable = [
        'product_label',
        'product_group',
        'product_type',
        'product_title',
        'plan',
        'duration',
        'reward',
        'program_id',
        'program_title',
        'environment',
        'created_by',
        'updated_by',
        'deleted_by',
    ];


}
