<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentApplication extends Model
{
    use HasFactory;
    protected $fillable = [
        'intake',
        'location',
        'study_model',
        'sponsor',
        'occupation',
        'visa',
        'notes',
        'status',
        'comment',
        'image_url',
        'image_folder',
        'image_name',
        'user_id',
        'course_id',
    ];

    public function course()
    {
        return $this->BelongsTo(UniCourse::class,  'course_id');
    }
    public function student()
    {
        return $this->BelongsTo(User::class,  'user_id');
    }
}
