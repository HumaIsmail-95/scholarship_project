<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'type',
        'image_name',
        'folder_name',
        'image_url',
        'created_by',
        'created_at',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by',
    ];
}
