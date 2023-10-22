<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'heading',
        'sub_heading',
        'description',
        'image_url',
        'image_folder',
        'image_name',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by','id');
    }
}
