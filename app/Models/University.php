<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function images()
    {
        return $this->hasMany(UniGallery::class,  'uni_id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class,);
    }
    public function country()
    {
        return $this->belongsTo(Country::class, 'country');
    }
}
