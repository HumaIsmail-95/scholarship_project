<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'native_english', 'user_id',
        'ielts_score',
        'pearson_score',
        'toelf_score',
        'created_by',
        'created_at',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by',
    ];

    public function testGalleries()
    {
        return $this->hasMany(TestGallery::class,  'test_id');
    }
}
