<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'page_name',
        'name',
        'image_url',
        'image_folder',
        'image_name',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
