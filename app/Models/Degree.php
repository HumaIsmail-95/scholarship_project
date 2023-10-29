<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'discipline_id',
        'description',
        'image_name',
        'image_folder',
        'image_url',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function discipline()
    {
        return $this->belongsTo(Discipline::class);
    }
    public function courses()
    {
        return $this->hasMany(UniCourse::class);
    }
}
