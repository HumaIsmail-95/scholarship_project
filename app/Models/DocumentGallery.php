<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'declaration', 'accept',
        'type',
        'image_name',
        'folder_name',
        'image_url',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
