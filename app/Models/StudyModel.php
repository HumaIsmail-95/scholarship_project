<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyModel extends Model
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
}
