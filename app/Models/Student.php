<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'name',
        'sur_name',
        'email',
        'alternative_modile',
        'mobile',
        'gender',
        'd_o_b',
        'id_type',
        'id_number',
        'id_document',
        'nationality',
        'visa_holder',
        'address',
        'city',
        'post_code',
        'state',
        'country',
        'travel_history',
        'traveled_to',
        'travel_document',
        'created_by',
        'created_at',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by',
    ];
}
