<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestGallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'test_id',
        'type',
        'image_name',
        'folder_name',
        'image_url',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
