<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseRequirement extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'test_name',
        'min_score',
        'min_score_level',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    public function course()
    {
        return $this->belongsTo(UniCourse::class, 'course_id');
    }
}
