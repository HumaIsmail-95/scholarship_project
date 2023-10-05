<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'about_us',
        'contact_us',
        'privacy_policy',
        'copy_right',
        'mobile_1', 'mobile_2', 'address',
    ];
}
