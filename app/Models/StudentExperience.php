<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentExperience extends Model
{
    use HasFactory;
    protected $fillable = [
        'joining', 'user_id',
        'ending',
        'employer_name',
        'location',
        'title',
        'duties',
        'created_by',
        'created_at',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by',
    ];

    public function experienceGalleries()
    {
        return $this->hasMany(DocumentGallery::class, 'user_id', 'user_id');
    }
}
