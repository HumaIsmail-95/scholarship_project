<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\Timer\Duration;

class UniCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'uni_id',
        'country_id',
        'city_id',
        'duration',
        'image_url',
        'image_name',
        'image_folder',
        'degree_id',
        'tuition_fee',
        'tuition_fee_type',
        'study_model_id',
        'description', 'requirement_details', 'other_requirements',
        'language',
        'discipline_id',
        'season',
        'start_month',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function university()
    {
        return $this->belongsTo(University::class, 'uni_id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    // public function duration()
    // {
    //     return $this->hasOne(Duration::class, 'duration_id');
    // }
    public function degree()
    {
        return $this->hasOne(Degree::class, 'id', 'degree_id');
    }
    public function studyModel()
    {
        return $this->hasOne(StudyModel::class, 'id', 'study_model_id');
    }
    public function discipline()
    {
        return $this->hasOne(Discipline::class, 'discipline_id');
    }
    public function requirements()
    {
        return $this->hasmany(CourseRequirement::class, 'course_id');
    }
}
