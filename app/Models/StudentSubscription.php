<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSubscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'price',
        'user_id',
        'package_id',
        'program_no',
        'active',
    ];
}
