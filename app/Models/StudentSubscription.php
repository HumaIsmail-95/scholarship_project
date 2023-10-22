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
    public function package()
    {
        return $this->belongsTo(SubscriptionPackage::class, 'package_id', 'id');
    }
}
