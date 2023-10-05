<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentEducation extends Model
{
    use HasFactory;
    protected $fillable = [
        'start', 'user_id', 'experience_check',
        'end',
        'program_name',
        'institute_name',
        'grade',
        'joining',
        'ending',
        'employer_name',
        'location',
        'title',
        'duties',
        'transcript',
        'certificate',
        'created_by',
        'created_at',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by',
    ];

    public function educationGalleries()
    {
        return $this->hasMany(EducationGallery::class,  'education_id', 'id');
    }
}
