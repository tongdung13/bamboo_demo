<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'content',
        'price',
        'image',
        'age_id',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_courses', 'course_id', 'category_id');
    }

    public function age()
    {
        return $this->belongsTo(Age::class);
    }

    public function userProfiles()
    {
        return $this->belongsToMany(UserProfile::class, 'course_user_profile', 'course_id', 'userProfile_id');
    }
}
