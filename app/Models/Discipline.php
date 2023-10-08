<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'description',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function degrees()
    {
        return $this->hasMany(Degree::class);
    }
    public function courses()
    {
        return $this->hasMany(UniCourse::class);
    }
}
