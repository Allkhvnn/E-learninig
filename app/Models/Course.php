<?php

namespace App\Models;

use ApiPlatform\Metadata\ApiResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[ApiResource]
class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'level',
        'duration',
        'price',
        'image',
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function isEnrolledBy($userId)
    {
        return $this->enrollments()->where('user_id', $userId)->exists();
    }
}